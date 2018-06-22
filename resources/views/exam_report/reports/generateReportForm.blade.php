@extends('layouts.app', [
	'vueView' => 'generate-exam-report-form-view'
])

@section('title')
    Exam Report
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
      <div class="col-md-12">
        <h3>Exam Report <small>&raquo; Generate report</small></h3>
      </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Generate Exam Report Form
                @endslot
               	<form class="form-horizontal" method="POST" action="{{ route('exam-report.generate') }}">

               		{{ csrf_field() }}

					<div class="form-group{{ $errors->has('session') ? ' has-error' : '' }}">
						<label for="session" class="col-md-4 control-label">Choose a session:</label>
						 <div class="col-md-6">

							<select class="form-control" id="session" name="session">
								<option selected disabled>Pick a session...</option>
								@foreach($schoolSessions as $schoolSession)
									<option 
										value="{{ $schoolSession->id }}" {{ old('session') == $schoolSession->id ? 'selected' : '' }}
										{{ $schoolSession->is_current == 1 ? 'selected' : ''}}>
											{{ $schoolSession->session }}
									</option>
								@endforeach
							</select>

							{!! $errors->first('session', '<span class="help-block">:message</span>') !!}
						</div>
					</div>

					<div class="form-group{{ $errors->has('school_class_id') ? ' has-error' : '' }}">
						<label for="name" class="col-md-4 control-label">Select Class:</label>
						 <div class="col-md-6">
						    <select class="form-control" id="school_class_id" name="school_class_id" @change="onClassChange">
						        <option selected disabled>Pick a class...</option>
						        @if (count($schoolClasses) > 0) 
						            @foreach ($schoolClasses as $schoolClass)
						                <option 
						                	value="{{ $schoolClass->id }}"
						                	{{ old('school_class_id') == $schoolClass->id ? ' selected' : '' }}>
						                		{{ $schoolClass->name}}
						            	</option>
						            @endforeach
						        @endif
						    </select>

							{!! $errors->first('school_class_id', '<span class="help-block">:message</span>') !!}
						</div>
					</div>

					<div class="form-group{{ $errors->has('academicInfo_id') ? ' has-error' : '' }}" v-if="showStudent">
					    <label for="group" class="col-md-4 control-label">Select Student:</label>
					    <div class="col-md-6">
						    <select class="form-control" id="academicInfo_id" name="academicInfo_id" @change="onStudentChange">
						    	<option selected disabled>Choose a student...</option>
						        @if(old('academicInfo_id'))
						            <option v-for="academicInfo in academicInfos"
						                :value="academicInfo.id" 
						                v-text="academicInfo.name + ' - ' + academicInfo.id"
						          		:selected="{{ json_encode(old('academicInfo_id')) }} == academicInfo.id ? true : false"></option>
						        @else
						            <option v-for="academicInfo in academicInfos" 
						            	:value="academicInfo.id" 
						            	v-text="academicInfo.name + ' - ' + academicInfo.id"></option>
						        @endif
					    	</select>
					    	{!! $errors->first('academicInfo_id', '<span class="help-block">:message</span>') !!}
						</div>
					</div>

					<div class="form-group" v-show="showSubmitButton">
					    <div class="col-md-6 col-md-offset-4">
					        <button type="submit" class="btn btn-primary">Generate</button>&nbsp;<a href="/" class="btn btn-default" role="button">Cancel</a>
					    </div>
					</div>
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection