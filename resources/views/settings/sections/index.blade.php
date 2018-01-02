@extends('layouts.app')

@section('title')
    Sections
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <data-table endpoint="{{ route('datatable.sections.index') }}"></data-table>
        </div>
    </div>
</div>
@endsection