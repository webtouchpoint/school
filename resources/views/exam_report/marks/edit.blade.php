@extends('layouts.app')

@section('title')
	Marks
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Marks <small>&raquo; Edit Marks</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Marks Edit Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('marks.update', $marks->id) }}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('examination_id') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Select Examination:</label>
                         <div class="col-md-6">
                            <select class="form-control" id="examination_id" name="examination_id" disabled>
                                <option selected disabled>Choose an Examination...</option>
                                @if (count($examinations) > 0) 
                                    @foreach ($examinations as $examination)
                                        <option 
                                            value="{{ $examination->id }}"
                                            {{ old('examination_id', optional($marks->examination)->id) == $examination->id ? ' selected' : '' }}>
                                                {{ $examination->name}}
                                        </option>
                                    @endforeach
                                @endif
                            </select>

                            {!! $errors->first('examination_id', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('school_class_id') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Select Class:</label>
                         <div class="col-md-6">
                            <select class="form-control" id="school_class_id" name="school_class_id" disabled>
                                <option selected disabled>Choose a class...</option>
                                @if (count($schoolClasses) > 0) 
                                    @foreach ($schoolClasses as $schoolClass)
                                        <option 
                                            value="{{ $schoolClass->id }}"
                                            {{ old('school_class_id', optional($marks->schoolClass)->id) == $schoolClass->id ? ' selected' : '' }}>
                                                {{ $schoolClass->name}}
                                        </option>
                                    @endforeach
                                @endif
                            </select>

                            {!! $errors->first('school_class_id', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="marks" class="col-md-4 control-label">{{ optional($marks->subject)->name }}</label>
                         <div class="col-md-6">
                            <input type="text" 
                                name="marks"
                                class="form-control" 
                                value="{{ old('marks', optional($marks)->marks) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                            <a href="{{ route('marks.index') }}" class="btn btn-default" role="button">Cancel</a>
                        </div>
                    </div>
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection