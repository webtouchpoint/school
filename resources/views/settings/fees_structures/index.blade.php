@extends('layouts.app')

@section('title')
    Subject
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <data-table endpoint="{{ route('datatable.fees-structures.index') }}"></data-table>
        </div>
    </div>
</div>
@endsection