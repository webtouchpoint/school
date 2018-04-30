{{ csrf_field() }}

<div class="form-group{{ $errors->has('fees_category') ? ' has-error' : '' }}">
	<label for="fees_category" class="col-md-4 control-label">Fees Category:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control" 
			value="{{ old('fees_category', $feesCategory->fees_category) }}" 
			id="fees_category" name="fees_category">

		{!! $errors->first('fees_category', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
	<label for="description" class="col-md-4 control-label">Description:</label>
	 <div class="col-md-6">
		<textarea class="form-control" 
			id="description" 
			name="description"
			rows="5">{{ old('description', $feesCategory->description) }}</textarea>

		{!! $errors->first('description', '<span class="help-block">:message</span>') !!}
	</div>
</div>


<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('fees-categories.index') }}" class="btn btn-default" role="button">Cancel</a>
    </div>
</div>