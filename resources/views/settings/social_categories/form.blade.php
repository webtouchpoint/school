{{ csrf_field() }}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	<label for="name" class="col-md-4 control-label">Social Category Name:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control input-sm" 
			value="{{ old('name', $socialCategory->name) }}" 
			id="name" name="name">

		{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
	<label for="description" class="col-md-4 control-label">Description:</label>
	 <div class="col-md-6">
		<textarea class="form-control input-sm" 
			id="description" 
			name="description"
			rows="5">{{ old('description', $socialCategory->description) }}</textarea>

		{!! $errors->first('description', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>&nbsp;<a href="{{ route('social-categories.index') }}" class="btn btn-default" role="button">Cancel</a>
    </div>
</div>