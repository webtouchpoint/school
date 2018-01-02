@extends('layouts.app')

@section('title')
	Subject Group
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Subject Group - Edit
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('subject-groups.update', $subjectGroup->id) }}">
                    {{ method_field('PATCH') }}
                    @include('settings.subject_groups.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection