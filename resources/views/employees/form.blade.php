{{ csrf_field() }}

<!-- Basic Information -->
<div>
    <h4><span aria-hidden="true" class="glyphicon glyphicon-info-sign"></span> Basic Information:</h4>
</div>
<div class="row">
		<div class="col-md-3">
		<div class="form-group{{ $errors->has('employee_position_id') ? ' has-error' : '' }}">
			<label for="employee_position_id" class="control-label">Position:</label>
		    <select 
		    	class="form-control" 
		    	id="employee_position_id" 
		    	name="employee_position_id">
		        <option selected disabled>Choose a Position...</option>
		        @if (count($employeePositions) > 0) 
		            @foreach ($employeePositions as $employeePosition)
		                <option 
		                	value="{{ $employeePosition->id }}"{{ old('employee_position_id', optional($employee)->employee_position_id) == $employeePosition->id ? ' selected' : '' }}>
		                		{{ $employeePosition->name }}
		            	</option>
		            @endforeach
		        @endif
		    </select>

			{!! $errors->first('employee_position_id', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('aadhaar') ? ' has-error' : '' }}">
			<label for="aadhaar" class="control-label">Aadhaar Number:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('aadhaar', $employee->aadhaar) }}" 
				id="aadhaar" name="aadhaar">

			{!! $errors->first('aadhaar', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			<label for="name" class="control-label">Name:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('name', $employee->name) }}" 
				id="name" name="name">

			{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
			<label for="gender" class="control-label">Gender:</label>
			<select class="form-control" 
				id="gender" name="gender">
				<option selected disabled>Select a gender.....</option>
				<option value="male"{{ old('gender', optional($employee)->gender) == 'male' ? 'selected' : '' }}>
					Male
				</option>
				<option value="female" {{ old('gender', optional($employee)->gender) == 'female' ? 'selected' : '' }}>
					Female
				</option>
			</select>

			{!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div> <!-- ./row -->

<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
			<label for="dob" class="control-label">Date of Birth:</label>
			<input type="text" 
				class="form-control datepicker" 
				value="{{ old('dob', optional($employee->dob)->format('d-m-Y')) }}" 
				id="dob" name="dob">

			{!! $errors->first('dob', '<span class="help-block">:message</span>') !!}
		</div>
	</div>	
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('social_category') ? ' has-error' : '' }}">
			<label for="social_category" class="control-label">Social Category:</label>
			<select class="form-control" 
				id="social_category" name="social_category">
				<option selected disabled>Select a social category.....</option>
				<option 
					value="general"{{ old('social_category', optional($employee)->social_category) == 'general' ? 'selected' : '' }}>
					General
				</option>
				<option 
					value="obc-a"{{ old('social_category', optional($employee)->social_category) == 'obc-a' ? 'selected' : '' }}>
					OBC-A
				</option>
				<option 
				value="obc-b"{{ old('social_category', optional($employee)->social_category) == 'obc-b' ? 'selected' : '' }}>
					OBC-B
				</option>
				<option 
					value="st"{{ old('social_category', optional($employee)->social_category) == 'st' ? 'selected' : '' }}>
					ST
				</option>
				<option 
					value="sc"{{ old('social_category', optional($employee)->social_category) == 'sc' ? 'selected' : '' }}>
					SC
				</option>
			</select>

			{!! $errors->first('social_category', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('religion') ? ' has-error' : '' }}">
			<label for="religion" class="control-label">Religion:</label>
			<select class="form-control" 
				id="religion" name="religion">
				<option selected disabled>Select a religion...</option>
				<option 
					value="hindu"{{ old('religion', optional($employee)->religion) == 'hindu' ? 'selected' : '' }}>
					Hindu
				</option>
				<option 
					value="muslim"{{ old('religion', optional($employee)->religion) == 'muslim' ? 'selected' : '' }}>
					Muslim
				</option>
				<option 
					value="christian"{{ old('religion', optional($employee)->religion) == 'christian' ? 'selected' : '' }}>
					Christian
				</option>
				<option 
					value="sikh"{{ old('religion', optional($employee)->religion) == 'sikh' ? 'selected' : '' }}>
					Sikh
				</option>
				<option 
					value="bhuddist"{{ old('religion', optional($employee)->religion) == 'buddist' ? 'selected' : '' }}>
					Bhuddist
				</option>
				<option 
					value="parsi"{{ old('religion', optional($employee)->religion) == 'parsi' ? 'selected' : '' }}>
					Parsi
				</option>
				<option 
					value="jain"{{ old('religion', optional($employee)->religion) == 'jain' ? 'selected' : '' }}>
					Jain
				</option>
				<option 
					value="others"{{ old('religion', optional($employee)->religion) == 'others' ? 'selected' : '' }}>
					Others
				</option>
			</select>

			{!! $errors->first('religion', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div> <!-- ./row -->

<div>
    <h4><span aria-hidden="true" class="glyphicon glyphicon-map-marker"></span> Address Details:</h4>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
			<label for="address" class="control-label">Address:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('address', $employee->address) }}" 
				id="address" name="address">

			{!! $errors->first('address', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
		<div class="col-md-3">
		<div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
			<label for="mobile" class="control-label">Mobile Number:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('mobile', $employee->mobile) }}" 
				id="mobile" name="mobile">

			{!! $errors->first('mobile', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<label for="email" class="control-label">Email Id:</label>
			<input type="email" 
				class="form-control" 
				value="{{ old('email', $employee->email) }}" 
				id="email" name="email">

			{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>

<div>
    <h4><span aria-hidden="true" class="glyphicon glyphicon-paperclip"></span> Joining:</h4>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('nature_of_appointment') ? ' has-error' : '' }}">
			<label for="nature_of_appointment" class="control-label">Nature of Appointment</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('nature_of_appointment', $employee->nature_of_appointment) }}" 
				id="nature_of_appointment" name="nature_of_appointment">

			{!! $errors->first('nature_of_appointment', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('date_of_joining_in_service') ? ' has-error' : '' }}">
			<label for="date_of_joining_in_service" class="control-label">Date of Joining in Service</label>
			<input type="text" 
				class="form-control datepicker" 
				value="{{ old('date_of_joining_in_service', optional($employee->date_of_joining_in_service)->format('d-m-Y')) }}" 
				id="date_of_joining_in_service" name="date_of_joining_in_service">

			{!! $errors->first('date_of_joining_in_service', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">&nbsp;</div>
	<div class="col-md-3">&nbsp;</div>

</div> <!-- ./row -->

<div>
    <h4><span aria-hidden="true" class="glyphicon glyphicon-education"></span> Highest Qualification:</h4>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('highest_qualification_academic') ? ' has-error' : '' }}">
			<label for="highest_qualification_academic" class="control-label">Academic</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('highest_qualification_academic', $employee->highest_qualification_academic) }}" 
				id="highest_qualification_academic" name="highest_qualification_academic">

			{!! $errors->first('highest_qualification_academic', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('highest_qualification_professional') ? ' has-error' : '' }}">
			<label for="highest_qualification_professional" class="control-label">Professional</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('highest_qualification_professional', $employee->highest_qualification_professional) }}" 
				id="highest_qualification_professional" name="highest_qualification_professional">

			{!! $errors->first('highest_qualification_professional', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">&nbsp;</div>
	<div class="col-md-3">&nbsp;</div>

</div> <!-- ./row -->

<div>
    <h4><span aria-hidden="true" class="glyphicon glyphicon-book"></span> Subjects:</h4>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('classes_taught') ? ' has-error' : '' }}">
			<label for="classes_taught" class="control-label">Classes Taught</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('classes_taught', $employee->classes_taught) }}" 
				id="classes_taught" name="classes_taught">

			{!! $errors->first('classes_taught', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('appointed_for_subject') ? ' has-error' : '' }}">
			<label for="appointed_for_subject" class="control-label">Appointed For Subject:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('appointed_for_subject', $employee->appointed_for_subject) }}" 
				id="appointed_for_subject" name="appointed_for_subject">

			{!! $errors->first('appointed_for_subject', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('main_subjects_taught_subject1') ? ' has-error' : '' }}">
			<label for="main_subjects_taught_subject1" class="control-label">Main Subjects Taught Subject1:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('main_subjects_taught_subject1', $employee->main_subjects_taught_subject1) }}" 
				id="main_subjects_taught_subject1" name="main_subjects_taught_subject1">

			{!! $errors->first('main_subjects_taught_subject1', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('main_subjects_taught_subject2') ? ' has-error' : '' }}">
			<label for="main_subjects_taught_subject2" class="control-label">Main Subjects Taught Subject2:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('main_subjects_taught_subject2', $employee->main_subjects_taught_subject2) }}" 
				id="main_subjects_taught_subject2" name="main_subjects_taught_subject2">

			{!! $errors->first('main_subjects_taught_subject2', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div> <!-- ./row -->

<div>
    <h4><span aria-hidden="true" class="glyphicon glyphicon-hand-right"></span> Others Details:</h4>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('mathematics_or_science_studied_upto') ? ' has-error' : '' }}">
			<label for="mathematics_or_science_studied_upto" class="control-label">Mathematics&#47; Science studied upto</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('mathematics_or_science_studied_upto', $employee->mathematics_or_science_studied_upto) }}" 
				id="mathematics_or_science_studied_upto" name="mathematics_or_science_studied_upto">

			{!! $errors->first('mathematics_or_science_studied_upto', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('english_studied_upto') ? ' has-error' : '' }}">
			<label for="english_studied_upto" class="control-label">English studied upto:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('english_studied_upto', $employee->english_studied_upto) }}" 
				id="english_studied_upto" name="english_studied_upto">

			{!! $errors->first('english_studied_upto', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('social_studies_studied_upto') ? ' has-error' : '' }}">
			<label for="social_studies_studied_upto" class="control-label">Social studies studied upto:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('social_studies_studied_upto', $employee->social_studies_studied_upto) }}" 
				id="social_studies_studied_upto" name="social_studies_studied_upto">

			{!! $errors->first('social_studies_studied_upto', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">&nbsp;</div>
</div> <!-- ./row -->

<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('type_of_disability') ? ' has-error' : '' }}">
			<label for="type_of_disability" class="control-label">Type of Disability*(If any)</label>
			<select class="form-control" 
				id="type_of_disability" name="type_of_disability">
				<option value="na"{{ old('type_of_disability') == 'na' ? 'selected' : '' }}>
					NA
				</option>
				<option value="visual(blindness)"{{ old('type_of_disability', optional($employee)->type_of_disability) == 'visual(blindness)' ? 'selected' : '' }}>
					Visual(Blindness)
				</option>
				<option value="visual(low-vision)"{{ old('type_of_disability', optional($employee)->type_of_disability) == 'visual(low-vision)' ? 'selected' : '' }}>
					Visual(Low-Vision)
				</option>
				<option value="hearing impaired"{{ old('type_of_disability', optional($employee)->type_of_disability) == 'hearing impaired' ? 'selected' : '' }}>
					Hearing Impaired
				</option>
				<option value="speech"{{ old('type_of_disability', optional($employee)->type_of_disability) == 'speech' ? 'selected' : '' }}>
					Speech
				</option>
				<option value="locomotor"{{ old('type_of_disability', optional($employee)->type_of_disability) == 'locomotor' ? 'selected' : '' }}>
					Locomotor
				</option>
				<option value="mental retardating"{{ old('type_of_disability', optional($employee)->type_of_disability) == 'mental retardating' ? 'selected' : '' }}>
					Mental Retardating
				</option>
				<option value="learning disability"{{ old('type_of_disability', optional($employee)->type_of_disability) == 'learning disability' ? 'selected' : '' }}>
					Learning disability
				</option>
				<option value="cerebal palsy"{{ old('type_of_disability', optional($employee)->type_of_disability) == 'cerebal palsy' ? 'selected' : '' }}>
					Cerebal Palsy
				</option>
			</select>

			{!! $errors->first('type_of_disability', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('working_in_present_school_since_year') ? ' has-error' : '' }}">
			<label for="working_in_present_school_since_year" class="control-label">Working in present school since year:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('working_in_present_school_since_year', optional($employee)->working_in_present_school_since_year) }}" 
				id="working_in_present_school_since_year" name="working_in_present_school_since_year">

			{!! $errors->first('working_in_present_school_since_year', '<span class="help-block">:message</span>') !!}
		</div>
	</div>	
	<div class="col-md-3">&nbsp;</div>
	<div class="col-md-3">&nbsp;</div>
</div><!-- ./row -->


<div class="row">
	<div class="col-md-12 text-center">
		<button type="submit" class="btn btn-primary">
			Save
		</button>
		<a href="{{ route('employees.index') }}" class="btn btn-default" role="button">Cancel</a>
	</div>
</div> <!-- ./row -->