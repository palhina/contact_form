@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h1>お問い合わせ</h1>
        </div>
        <form class="form" action="/contacts/confirm" method="post">
            @csrf
            <div class="form__group">
                    <div class="form__group-title">
                        <div class="form__label--item">お名前</div>
                        <div class="form__label--required">※</div>
                    </div>
                    <div class="form__group-content">
                        <div class="form__name-input">
                            <div class="form__last-name">
                                <div class="form__last-name-text">
                                    <input type="text" name="lastname" value="{{ old('lastname') }}" />
                                </div>
                                <div class="form__example">
                                    例）山田
                                </div>
                            </div>
                            <div class="form__first-name">
                                <div class="form__first-name-text">
                                    <input type="text" name="firstname" value="{{ old('firstname') }}"/>
                                </div>
                                <div class="form__example">
                                    例）太郎
                                </div>
                            </div>
                        </div>
                        <div class="form__error">
                                @error('last_name')
                                {{ $message }}
                                @enderror
                        </div>
                        <div class="form__error">
                                @error('first_name')
                                {{ $message }}
                                @enderror
                        </div>
                    </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">性別</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="gender-selection">
                    <label class="gender-selection__btn">
                        <input type="radio" name="gender" value="男性" checked class="custom-radio"> 男性
                    </label>
                    <label class="gender-selection__btn">
                        <input type="radio" name="gender" value="女性" class="custom-radio"> 女性
                    </label>
                </div>
                <div class="form__error">
                    @error('gender')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="email" name="email" value="{{ old('email') }}"/>
                        </div>
                        <div class="form__example">
                            例）test@example.com
                        </div>
                        <div class="form__error">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">郵便番号</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="postcode" value="{{ old('postcode') }}"/>
                        </div>
                        <div class="form__example">
                            例）123-4567
                        </div>
                        <div class="form__error">
                            @error('postcode')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">住所</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="address" value="{{ old('address') }}"/>
                        </div>
                        <div class="form__example">
                            例）東京都渋谷区千駄ヶ谷1-2-3
                        </div>
                        <div class="form__error">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">建物名</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="building_name" value="{{ old('building_name') }}"/>
                        </div>
                        <div class="form__example">
                            例）千駄ヶ谷マンション101
                        </div>
                        <div class="form__error">
                            @error('building_name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">ご意見</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--textarea">
                            <textarea name="opinion">{{ old('opinion') }}</textarea>
                        </div>
                        <div class="form__error">
                            @error('opinion')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="form__button">
                    <button class="form__button-submit" type="submit">確認</button>
            </div>
        </form>
    </div>
@endsection