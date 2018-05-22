{{ csrf_field() }}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	<label for="name" class="col-md-4 control-label">Employee Position Name:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control" 
			value="{{ old('name', $employeePosition->name) }}" 
			id="name" name="name">

		{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>&nbsp;<a href="{{ route('employee-positions.index') }}" class="btn btn-default" role="button">Cancel</a>
    </div>
</div>