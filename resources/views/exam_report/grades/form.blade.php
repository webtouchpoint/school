{{ csrf_field() }}

<div class="form-group{{ $errors->has('letter_grade') ? ' has-error' : '' }}">
	<label for="letter_grade" class="col-md-4 control-label">Letter Grade:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control" 
			id="letter_grade" 
			name="letter_grade"
			value="{{ old('letter_grade', $grade->letter_grade) }}">

		{!! $errors->first('letter_grade', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('marks_from') ? ' has-error' : '' }}">
	<label for="marks_from" class="col-md-4 control-label">Marks From:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control" 
			id="marks_from" 
			name="marks_from"
			value="{{ old('marks_from', $grade->marks_from) }}">

		{!! $errors->first('marks_from', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('marks_to') ? ' has-error' : '' }}">
	<label for="marks_to" class="col-md-4 control-label">Marks To:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control" 
			id="marks_to" 
			name="marks_to"
			value="{{ old('marks_to', $grade->marks_to) }}">

		{!! $errors->first('marks_to', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('performance') ? ' has-error' : '' }}">
	<label for="performance" class="col-md-4 control-label">Performance:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control" 
			id="performance" 
			name="performance"
			value="{{ old('performance', $grade->performance) }}">

		{!! $errors->first('performance', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>&nbsp;<a href="{{ route('grades.index') }}" class="btn btn-default" role="button">Cancel</a>
    </div>
</div>