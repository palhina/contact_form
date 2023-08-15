<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller
{
    // トップページの表示
    public function index()
    {
    return view('index');
    }
    //トップページから確認ページへの遷移
    public function confirm(ContactRequest $request)
    {
    $lastname = $request->input('lastname');
    $firstname = $request->input('firstname');
    $fullname = $lastname . $firstname;
    $contact = $request->only(['gender','email', 'postcode', 'address', 'building_name', 'opinion']);
    return view('confirm', compact('fullname','contact'));
    }
    // データを保存ずる
    public function store(Request $request)
    {
    $data = $request->only(['fullname','gender','email', 'postcode', 'address', 'building_name', 'opinion']);
    Contact::create($data);
    return view('thanks');
    }
    // サンクスページからindexページへ遷移
    public function return()
    {
        return view('index');
    }
    //管理システムページの表示
    public function manage()
    {
    $contacts = Contact::paginate(10);
    return view ('manage',compact('contacts'));
    }

    //検索機能
    public function search(Request $request)
    {
        $fullnameQuery = $request ->input('fullname');
        $gender = $request ->input('gender');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $emailQuery =  $request ->input('email');

        $query = Contact::query();

        if ($fullnameQuery) {
        $query->where('fullname', 'LIKE', "%$fullnameQuery%");
        }

        if ($startDate && $endDate) {
        $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        if ($gender !== 'all'){
            $query->where('gender', $gender);
        }

        if ($emailQuery) {
        $query->where('email', 'LIKE', "%$emailQuery%");
        }

        $results = $query->paginate(10);

        return view('result', compact('results'));
    }

    // データの削除
    public function destroy(Request $request)
    {
    Contact::find($request->id)->delete();
    return redirect('/manage');
    }
}