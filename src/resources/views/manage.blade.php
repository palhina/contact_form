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
            @extends('search')
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