@extends('search')

@section('result')
    <div class="pagination">
            {{$results->appends(request()->query())->links()}}
        <!--検索結果でページネーションつける場合、appends(request()->query())をつけないと、2p目以降表示の際に検索条件が消されて、表示できなくなる -->
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
            @foreach ($results as $result)
            <tr class="customer-table__row">
                <div class="customer-table__item">
                <form class="delete-form" action="/manage/delete" method="post">
                        @method('DELETE')
                        @csrf
                        <td class="update-form__item">
                            <input class="update-form__item-input-id" type="text" name="id" value="{{ $result->id }}" readonly/>
                        <td class="update-form__item">
                            <input class="update-form__item-input-name" type="text" name="fullname" value="{{ $result -> fullname }}" readonly/>
                        </td>
                        <td class="update-form__item">
                            <input class="update-form__item-input-sex" type="text" name="gender" value="{{ $result->gender }}" readonly/>
                        </td>
                        <td class="update-form__item">
                            <input class="update-form__item-input-email" type="text" name="email" value="{{ $result->email}}" readonly/>
                        </td>
                        <td class="update-form__item">
                            <input class="update-form__item-input-content" type="text" name="opinion" value="{{ $result->opinion}}" readonly/>
                        <td class="delete-form__button">
                            <input type="hidden" name="id" value="{{ $result->id }}">
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