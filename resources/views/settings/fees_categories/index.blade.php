@extends('layouts.app')

@section('title')
    Fees Categories
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <data-table endpoint="{{ route('datatable.fees-categories.index') }}"></data-table>
        </div>
    </div>
</div>
@endsection