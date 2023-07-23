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
    // 検索リセット機能
    public function reset()
    {
    return view ('manage');
    }
    //検索機能
    public function search(Request $request)
    {
    $item = Author::where('fullname', 'LIKE',"%{$request->input}%")->get();
        $param = [
            'input' => $request->input,
            'item' => $item
        ];
    return view('result', $param);
    }
    // データの削除
    public function destroy(Request $request)
    {
    Contact::find($request->id)->delete();
    return redirect('/manage');
    }
}