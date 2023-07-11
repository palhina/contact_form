@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')
        <div class="thanks__content">
            <div class="thanks__heading">
                <h1 class="thanks__message">ご意見いただきありがとうございました。</h1>
            </div>
        </div>
        <form class="form__button" action="/return" method="get">
            <button class="form__button-redirect" type="submit">トップページへ</button>
        </form>
@endsection