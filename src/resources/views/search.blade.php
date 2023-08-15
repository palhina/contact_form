@extends('layout.app')
<style>
    svg.w-5.h-5 {
    width: 30px;
    height: 30px;
    }

</style>

@section('css')
    <link rel="stylesheet" href="{{ asset('css/manage.css') }}">
@endsection

@section('content')
    <div class="management__content">
        <div class="management__heading">
            <h1>管理システム</h1>
        </div>
        <div class="management__search-form">
            <form class="search-form" action="/manage/search" method="get">
            @csrf
                <div class="form__name">
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">お名前</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input class="search-form__item-input" type="text" name="fullname" >
                            </div>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">性別</span>
                        </div>
                        <label class="form__group-gender">
                            <input class="search-form__item-input" type="radio" name="gender" value="all" checked> 全て
                        </label>
                        <label class="form__group-gender">
                            <input  class="search-form__item-input" type="radio" name="gender" value="男性"> 男性
                        </label>
                        <label class="form__group-gender">
                            <input  class="search-form__item-input" type="radio" name="gender" value="女性"> 女性
                        </label>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">登録日</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--date">
                            <div class="form__input--text">
                                <input  class="search-form__item-input" type="text" name="start_date" value=""/>
                            </div>
                            <span class="date__from-to">~</span>
                            <div class="form__input--text">
                                <input  class="search-form__item-input" type="text" name="end_date" value=""/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input  class="search-form__item-input" type="text" name="email" value=""/>
                        </div>
                    </div>
                </div>
                <div class="form__button">
                    <button class="form__button-search" type="submit">検索</button>
                </div>
            <div class="reset-btn-wrapper">
                <a class="reset-btn" href="{{'/manage' }}" style="
    display: block; text-align: center;">リセット</a>
            </div>
            </form>
        </div>
    </div>
    @yield('result')
@endsection