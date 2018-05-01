@extends('layouts.app')

@section('title')
    Balance Sheet
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12 text-center">
            <h3>Balance Sheet</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panel')
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Income</th>
                            <th class="text-center">Expenditure</th>
                            <th class="text-center">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                {{ $income }}
                            </td>
                            <td class="text-center">
                                {{ $expenditure }}
                            </td>
                            <td class="text-center">
                                {{ ($income - $expenditure) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endcomponent
        </div>
    </div>
</div>
@endsection
