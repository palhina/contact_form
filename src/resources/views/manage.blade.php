@extends('search')

    @section('result')
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