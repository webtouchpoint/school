{{ csrf_field() }}
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	<label for="name" class="col-md-4 control-label">Name:</label>
	 <div class="col-md-6">
		<input type="text" class="form-control" value="{{ old('name', $school->name) }}" id="name" name="name">

		{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('address_line1') ? ' has-error' : '' }}">
	<label for="address_line1" class="col-md-4 control-label">Address line1:</label>
	<div class="col-md-6">
		<input type="text" class="form-control" value="{{ old('address_line1', $school->address_line1) }}" id="address_line1" name="address_line1">

		{!! $errors->first('address_line1', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('address_line2') ? ' has-error' : '' }}">
	<label for="address_line2" class="col-md-4 control-label">Address line2:</label>
	<div class="col-md-6">
		<input type="text" class="form-control" value="{{ old('address_line1', $school->address_line2) }}" id="address_line2" name="address_line2">

		{!! $errors->first('address_line2', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('dist') ? ' has-error' : '' }}">
	<label for="dist" class="col-md-4 control-label">Dist:</label>
	<div class="col-md-6">
		<input type="text" class="form-control" value="{{ old('dist', $school->dist) }}" id="dist" name="dist">

		{!! $errors->first('dist', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
	<label for="state" class="col-md-4 control-label">State:</label>
	<div class="col-md-6">
		<input type="text" class="form-control" value="{{ old('state', $school->state) }}" id="state" name="state">

		{!! $errors->first('state', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('pin') ? ' has-error' : '' }}">
	<label for="pin" class="col-md-4 control-label">Pin:</label>
	<div class="col-md-6">
		<input type="text" class="form-control" value="{{ old('pin', $school->pin) }}" id="pin" name="pin">

		{!! $errors->first('pin', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('dise_code') ? ' has-error' : '' }}">
	<label for="dise_code" class="col-md-4 control-label">Dise Code:</label>
	<div class="col-md-6">
		<input type="text" class="form-control" value="{{ old('dise_code', $school->dise_code) }}" id="dise_code" name="dise_code">

		{!! $errors->first('dise_code', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('date_of_establishment') ? ' has-error' : '' }}">
	<label for="date_of_establishment" class="col-md-4 control-label">Date of Establishment:</label>
	<div class="col-md-6">
		<input type="text" class="form-control datepicker" value="{{ old('date_of_establishment', optional($school->date_of_establishment)->format('d-m-Y')) }}" id="date_of_establishment" name="date_of_establishment">

		{!! $errors->first('date_of_establishment', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
	<label for="type" class="col-md-4 control-label">School Type:</label>
	<div class="col-md-6">
		<input type="text" class="form-control" value="{{ old('type', $school->type) }}" id="type" name="type">

		{!! $errors->first('type', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('lowest_class') ? ' has-error' : '' }}">
	<label for="lowest_class" class="col-md-4 control-label">Lowest Class Number:</label>
	<div class="col-md-6">
		<input type="text" class="form-control" 
		value="{{ old('lowest_class', $school->lowest_class) }}" 
		id="lowest_class" name="lowest_class">

		{!! $errors->first('lowest_class', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('highest_class') ? ' has-error' : '' }}">
	<label for="highest_class" class="col-md-4 control-label">Highest Class Number:</label>
	<div class="col-md-6">
		<input type="text" class="form-control" value="{{ old('highest_class', $school->highest_class) }}" id="highest_class" name="highest_class">

		{!! $errors->first('highest_class', '<span class="help-block">:message</span>') !!}
	</div>
</div>


<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
	<label for="phone" class="col-md-4 control-label">Phone Number:</label>
	<div class="col-md-6">
		<input phone="text" class="form-control" value="{{ old('phone', $school->phone) }}" id="phone" name="phone">

		{!! $errors->first('phone', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	<label for="email" class="col-md-4 control-label">Email Id:</label>
	<div class="col-md-6">
		<input email="text" class="form-control" value="{{ old('email', $school->email) }}" id="email" name="email">

		{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="/" class="btn btn-default" role="button">Cancel</a>
    </div>
</div>