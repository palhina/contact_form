<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller
{
    public function index()
    {
    return view('index');
    }
    public function confirm(ContactRequest $request)
    {
    $lastname = $request->input('last_name');
    $firstname = $request->input('first_name');
    $fullname = $lastname . $firstname;
    $contact = $request->only(['gender','email', 'postcode', 'address', 'building_name', 'opinion']);
    return view('confirm', compact('fullname','contact'));
    }
    public function store(Request $request)
    {
    $data = $request->only(['fullname','gender','email', 'postcode', 'address', 'building_name', 'opinion']);
    Contact::create($data);
    return view('thanks');
    }
    // 修正ボタンの挙動
    public function edit(Request $request)
    {
    $request->session()->flash('_old_input',[
            'last_name' => $lastname,
            'first_name' => $firstname,
        ]);
    return redirect()->route('index');
    }

    public function return()
    {
        return view('index');
    }

    public function manage()
    {
    $contacts = Contact::paginate(10);
    return view ('manage',compact('contacts'));
    }
    public function reset()
    {
    return view ('manage');
    }
    
    public function search(Request $request)
    {
    $results = Contact::ContactSearch(
        $request->input('fullname'),
        $request->input('gender'),
        $request->input('start_date'),
        $request->input('end_date'),
        $request->input('email'),
    )->get();

    return view('results', compact('resuls'));
    }

    public function destroy(Request $request)
    {
    Contact::find($request->id)->delete();
    return redirect('/manage');
    }
}