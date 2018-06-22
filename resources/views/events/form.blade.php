{{ csrf_field() }}

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	<label for="title" class="col-md-4 control-label">Title:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control" 
			value="{{ old('title', $event->title) }}" 
			id="title" name="title">

		{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
	<label for="start_date" class="col-md-4 control-label">Start date:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control datepicker" 
			value="{{ old('start_date', optional($event->start_date)->format('d-m-Y')) }}" 
			id="start_date" name="start_date">

		{!! $errors->first('start_date', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
	<label for="end_date" class="col-md-4 control-label">End date:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control datepicker" 
			value="{{ old('end_date', optional($event->end_date)->format('d-m-Y')) }}" 
			id="end_date" name="end_date">

		{!! $errors->first('end_date', '<span class="help-block">:message</span>') !!}
	</div>
</div>


<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>&nbsp;<a href="{{ route('events.index') }}" class="btn btn-default" role="button">Cancel</a>
    </div>
</div>