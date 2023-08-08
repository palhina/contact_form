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
                                    <input class="search-form__item-input" type="text" name="fullname" value="{{ old('fullname') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form__group">
                            <div class="form__group-title">
                                <span class="form__label--item">性別</span>
                            </div>
                            <label class="form__group-gender">
                                <input class="search-form__item-input" type="radio" name="gender" value="" checked> 全て
                            </label>
                            <label class="form__group-gender">
                                <input  class="search-form__item-input" type="radio" name="gender" value="male"> 男性
                            </label>
                            <label class="form__group-gender">
                                <input  class="search-form__item-input" type="radio" name="gender" value="female"> 女性
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
                                    <input  class="search-form__item-input" type="text" name="start_date" value="{{ old('start_date') }}"/>
                                </div>
                                <span class="date__from-to">~</span>
                                <div class="form__input--text">
                                    <input  class="search-form__item-input" type="text" name="end_date" value="{{ old('end_date') }}"/>
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
                                <input  class="search-form__item-input" type="text" name="email" value="{{ old('email') }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form__button">
                        <button class="form__button-search" type="submit">検索</button>
                    </div>
                    <div class="form__button">
                        <input class="form__button-reset" name="reset" type="reset" value="リセット">
                    </div>
                </form>
            </div>
        </div>
        <div class="pagination">
            {{$contacts->links()}}
        </div>
        <div class="management__customer">
                <table class="customer-table__inner">
                    <tr class="customer-table__row">
                        <div class="customer-table__header">
                            <th class="customer-table__header-span">ID</th>
                            <th class="customer-table__header-span">お名前</th>
                            <th class="customer-table__header-span">性別</th>
                            <th class="customer-table__header-span">メールアドレス</th>
                            <th class="customer-table__header-span">ご意見</th>
                        </div>
                    </tr>
                    @foreach ($contacts as $contact)
                    <tr class="customer-table__row">
                        <div class="customer-table__item">
                        <form class="delete-form" action="/manage/delete" method="post">
                                @method('DELETE')
                                @csrf
                                <td class="update-form__item">
                                    <input class="update-form__item-input-id" type="text" name="id" value="{{ $contact['id'] }}" readonly/>
                                </td>
                                <td class="update-form__item">
                                    <input class="update-form__item-input-name" type="text" name="fullname" value="{{ $contact['fullname'] }}" readonly/>
                                </td>
                                <td class="update-form__item">
                                    <input class="update-form__item-input-sex" type="text" name="gender" value="{{ $contact['gender'] }}" readonly/>
                                </td>
                                <td class="update-form__item">
                                    <input class="update-form__item-input-email" type="text" name="email" value="{{ $contact['email'] }}" readonly/>
                                </td>
                                <td class="update-form__item">
                                    <input class="update-form__item-input-content" type="text" name="opinion" value="{{ $contact['opinion'] }}" readonly/>
                                <td class="delete-form__button">
                                    <input type="hidden" name="id" value="{{ $contact['id'] }}">
                                    <button class="delete-form__button-submit" type="submit">
                                        削除
                                    </button>
                                </td>
                            </form>
                        </div>
                    </tr>
                    @endforeach
                </table>
        </div>
@endsection