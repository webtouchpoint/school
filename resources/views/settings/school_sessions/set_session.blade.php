@extends('layouts.app')

@section('title')
    Session - Set
@endsection

@section('content')
<div class="container">
	    <div class="row page-title-row">
      <div class="col-md-12">
        <h3>Session <small>&raquo; Set Current Session</small></h3>
      </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Set Current Session Form
                @endslot
               	<form class="form-horizontal" method="POST" action="{{ route('school-sessions.set-session') }}">

               		{{ csrf_field() }}

					<div class="form-group{{ $errors->has('session') ? ' has-error' : '' }}">
						<label for="session" class="col-md-4 control-label">Choose a session to set current:</label>
						 <div class="col-md-6">

							<select class="form-control" id="session" name="session">
								<option selected disabled>Pick a session...</option>
								@foreach($schoolSessions as $schoolSession)
									<option 
										value="{{ $schoolSession->id }}" {{ old('session') == $schoolSession->id ? 'selected' : '' }}>
											{{ $schoolSession->session }}
									</option>
								@endforeach
							</select>

							{!! $errors->first('session', '<span class="help-block">:message</span>') !!}
						</div>
					</div>

					<div class="form-group">
					    <div class="col-md-6 col-md-offset-4">
					        <button type="submit" class="btn btn-primary">Save</button>&nbsp;<a href="{{ route('school-sessions.index') }}" class="btn btn-default" role="button">Cancel</a>
					    </div>
					</div>
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
{{ csrf_field() }}