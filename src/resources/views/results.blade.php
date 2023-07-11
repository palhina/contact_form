@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/manage.css') }}">
@endsection

@section('content')
        <div class="management__customer">
                <table class="customer-table__inner">
                    <tr class="customer-table__row">
                        <div class="customer-table__header">
                            <th class="customer-table__header-span">ID</th>
                            <th class="customer-table__header-span">お名前</th>
                            <th class="customer-table__header-span">性別</th>
                            <th class="customer-table__header-span">メールアドレス</th>
                            <th class="customer-table__header-span">ご意見</th>
                            <th class="customer-table__header-span"></th>
                        </div>
                    </tr>
                    @if ($results->count() > 0)
                    @foreach ($resultss as $result)
                        <tr class="customer-table__row">
                            <div class="customer-table__item">
                                <td class="update-form__item">
                                    {{ $result->id }}
                                </td>
                                <td class="update-form__item">
                                    {{ $result->fullname }}
                                </td>
                                <td class="update-form__item">
                                    {{ $result->gender }}
                                </td>
                                <td class="update-form__item">
                                {{ $result->email }}
                                </td>
                                <td class="update-form__item">
                                {{ $result->opinion }}
                                </td>
                            </div>
                        </tr>
                    @endforeach
                    @else
                        <tr class="customer-table__row">
                            <td colspan="6">該当するデータがありません。</td>
                        </tr>
                    @endif
                </table>
        </div>
@endsection