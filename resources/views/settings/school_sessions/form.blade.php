{{ csrf_field() }}

<div class="form-group{{ $errors->has('session') ? ' has-error' : '' }}">
	<label for="session" class="col-md-4 control-label">Session:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control input-sm" 
			value="{{ old('session', $schoolSession->session) }}" 
			id="session" name="session">

		{!! $errors->first('session', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
	<label for="start_date" class="col-md-4 control-label">Start date:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control input-sm datepicker" 
			value="{{ old('start_date', optional($schoolSession->start_date)->format('d-m-Y')) }}" 
			id="start_date" name="start_date">

		{!! $errors->first('start_date', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
	<label for="end_date" class="col-md-4 control-label">End date:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control input-sm datepicker" 
			value="{{ old('end_date', optional($schoolSession->end_date)->format('d-m-Y')) }}" 
			id="end_date" name="end_date">

		{!! $errors->first('end_date', '<span class="help-block">:message</span>') !!}
	</div>
</div>
<div class="form-group">
	<div class="checkbox col-md-6 col-md-offset-4">
		<label>
	  		<input type="checkbox" 
	  			name="is_current" 
	  			id="is_current" 
	  			value="1"> Current Year
		</label>
	</div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>&nbsp;<a href="{{ route('school-sessions.index') }}" class="btn btn-default" role="button">Cancel</a>
    </div>
</div>