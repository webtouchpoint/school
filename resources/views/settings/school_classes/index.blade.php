@extends('layouts.app')

@section('title')
    Classes
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <data-table endpoint="{{ route('datatable.school-classes.index') }}"></data-table>
        </div>
    </div>
</div>
@endsection