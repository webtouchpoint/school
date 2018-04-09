{{ csrf_field() }}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	<label for="name" class="col-md-4 control-label">Class Name:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control" 
			value="{{ old('name', $schoolClass->name) }}" 
			id="name" name="name">

		{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('numeric') ? ' has-error' : '' }}">
	<label for="numeric" class="col-md-4 control-label">Class in numeric:</label>
	 <div class="col-md-6">
		<input type="number" 
			class="form-control" 
			value="{{ old('numeric', $schoolClass->numeric) }}" 
			id="numeric" name="numeric"
			min="1" max="12">

		{!! $errors->first('numeric', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
	<label for="description" class="col-md-4 control-label">Description:</label>
	 <div class="col-md-6">
		<textarea class="form-control" 
			id="description" 
			name="description"
			rows="5">{{ old('description', $schoolClass->description) }}</textarea>

		{!! $errors->first('description', '<span class="help-block">:message</span>') !!}
	</div>
</div>


<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>&nbsp;<a href="{{ route('school-classes.index') }}" class="btn btn-default" role="button">Cancel</a>
    </div>
</div>