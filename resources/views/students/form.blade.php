{{ csrf_field() }}
<div>
    <h4><span aria-hidden="true" class="glyphicon glyphicon-triangle-right"></span> System information:</h4>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('school_session_id') ? ' has-error' : '' }}">
			<label for="school_session_id" class="control-label">Session:</label>
		    <select 
		    	class="form-control" 
		    	id="school_session_id" 
		    	name="school_session_id">
		        <option selected disabled>Choose a class...</option>
		        @if (count($schoolSessions) > 0) 
		            @foreach ($schoolSessions as $schoolSession)
		                <option 
		                	value="{{ $schoolSession->id }}"{{ old('school_session_id', optional($academicInfo)->school_session_id) == $schoolSession->id ? ' selected' : '' }}>
		                		{{ $schoolSession->session }}
		            	</option>
		            @endforeach
		        @endif
		    </select>

			{!! $errors->first('school_session_id', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('school_class_id') ? ' has-error' : '' }}">
			<label for="school_class_id" class="control-label">Class:</label>
		    <select 
		    	class="form-control" 
		    	id="school_class_id" 
		    	name="school_class_id" @change="onClassChange">
		        <option selected disabled>Choose a class...</option>
		        @if (count($schoolClasses) > 0) 
		            @foreach ($schoolClasses as $schoolClass)
		                <option 
		                	value="{{ $schoolClass->id }}"{{ old('school_class_id', optional($academicInfo)->school_class_id) == $schoolClass->id ? ' selected' : '' }}>
		                		{{ $schoolClass->name }}
		            	</option>
		            @endforeach
		        @endif
		    </select>

			{!! $errors->first('school_class_id', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('section_id') ? ' has-error' : '' }}">
			<label for="section_id" class="control-label">Section:</label>
		    <select 
		    	class="form-control" 
		    	id="section_id" 
		    	name="section_id">
		    	<option selected disabled>Choose a section...</option>
		        @if(old('section_id', optional($academicInfo)->section_id))
		            <option v-for="section in sections"
		                :value="section.id" 
		                v-text="section.name"
		          		:selected="{{ json_encode(old('section_id', optional($academicInfo)->section_id)) }} == section.id ? true : false"></option>
		        @else
		            <option v-for="section in sections" :value="section.id" v-text="section.name"></option>
		        @endif
	    	</select>

	    	{!! $errors->first('section_id', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('roll_number') ? ' has-error' : '' }}">
			<label for="roll_number" class="control-label">Roll Number:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('roll_number', optional($academicInfo)->roll_number) }}" 
				id="roll_number" name="roll_number">

			{!! $errors->first('roll_number', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div> <!-- ./row -->

<!-- Basic Information -->
<div>
    <h4><span aria-hidden="true" class="glyphicon glyphicon-info-sign"></span> Basic Information:</h4>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('aadhaar') ? ' has-error' : '' }}">
			<label for="aadhaar" class="control-label">Aadhaar Number:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('aadhaar', $student->aadhaar) }}" 
				id="aadhaar" name="aadhaar">

			{!! $errors->first('aadhaar', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			<label for="name" class="control-label">Name:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('name', $student->name) }}" 
				id="name" name="name">

			{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('fathers_name') ? ' has-error' : '' }}">
			<label for="fathers_name" class="control-label">Father&#39;s Name:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('fathers_name', $student->fathers_name) }}" 
				id="fathers_name" name="fathers_name">

			{!! $errors->first('fathers_name', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('mothers_name') ? ' has-error' : '' }}">
			<label for="mothers_name" class="control-label">Mother&#39;s Name:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('mothers_name', $student->mothers_name) }}" 
				id="mothers_name" name="mothers_name">

			{!! $errors->first('mothers_name', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div> <!-- ./row -->

<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
			<label for="dob" class="control-label">Date of Birth:</label>
			<input type="text" 
				class="form-control datepicker" 
				value="{{ old('dob', optional($student->dob)->format('d-m-Y')) }}" 
				id="dob" name="dob">

			{!! $errors->first('dob', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
			<label for="gender" class="control-label">Gender:</label>
			<select class="form-control" 
				id="gender" name="gender">
				<option selected disabled>Select a gender.....</option>
				<option value="male"{{ old('gender', optional($student)->gender) == 'male' ? 'selected' : '' }}>
					Male
				</option>
				<option value="female" {{ old('gender', optional($student)->gender) == 'female' ? 'selected' : '' }}>
					Female
				</option>
			</select>

			{!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('social_category') ? ' has-error' : '' }}">
			<label for="social_category" class="control-label">Social Category:</label>
			<select class="form-control" 
				id="social_category" name="social_category">
				<option selected disabled>Select a social category.....</option>
				<option 
					value="general"{{ old('social_category', optional($student)->social_category) == 'general' ? 'selected' : '' }}>
					General
				</option>
				<option 
					value="obc-a"{{ old('social_category', optional($student)->social_category) == 'obc-a' ? 'selected' : '' }}>
					OBC-A
				</option>
				<option 
				value="obc-b"{{ old('social_category', optional($student)->social_category) == 'obc-b' ? 'selected' : '' }}>
					OBC-B
				</option>
				<option 
					value="st"{{ old('social_category', optional($student)->social_category) == 'st' ? 'selected' : '' }}>
					ST
				</option>
				<option 
					value="sc"{{ old('social_category', optional($student)->social_category) == 'sc' ? 'selected' : '' }}>
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
					value="hindu"{{ old('religion', optional($student)->religion) == 'hindu' ? 'selected' : '' }}>
					Hindu
				</option>
				<option 
					value="muslim"{{ old('religion', optional($student)->religion) == 'muslim' ? 'selected' : '' }}>
					Muslim
				</option>
				<option 
					value="christian"{{ old('religion', optional($student)->religion) == 'christian' ? 'selected' : '' }}>
					Christian
				</option>
				<option 
					value="sikh"{{ old('religion', optional($student)->religion) == 'sikh' ? 'selected' : '' }}>
					Sikh
				</option>
				<option 
					value="bhuddist"{{ old('religion', optional($student)->religion) == 'buddist' ? 'selected' : '' }}>
					Bhuddist
				</option>
				<option 
					value="parsi"{{ old('religion', optional($student)->religion) == 'parsi' ? 'selected' : '' }}>
					Parsi
				</option>
				<option 
					value="jain"{{ old('religion', optional($student)->religion) == 'jain' ? 'selected' : '' }}>
					Jain
				</option>
				<option 
					value="others"{{ old('religion', optional($student)->religion) == 'others' ? 'selected' : '' }}>
					Others
				</option>
			</select>

			{!! $errors->first('religion', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div> <!-- ./row -->

<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('mother_tongue') ? ' has-error' : '' }}">
			<label for="mother_tongue" class="control-label">Mother Tongue:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('mother_tongue', $student->mother_tongue) }}" 
				id="mother_tongue" name="mother_tongue">

			{!! $errors->first('mother_tongue', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
			<label for="mobile" class="control-label">Mobile Number:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('mobile', $student->mobile) }}" 
				id="mobile" name="mobile">

			{!! $errors->first('mobile', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<label for="email" class="control-label">Email Id:</label>
			<input type="email" 
				class="form-control" 
				value="{{ old('email', $student->email) }}" 
				id="email" name="email">

			{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">&nbsp;</div>
</div><!-- ./row -->

<div>
    <h4><span aria-hidden="true" class="glyphicon glyphicon-map-marker"></span> Address Details:</h4>
</div>
<div class="row">
	<div class="col-md-9">
		<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
			<label for="address" class="control-label">Address:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('address', $student->address) }}" 
				id="address" name="address">

			{!! $errors->first('address', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('locality') ? ' has-error' : '' }}">
			<label for="locality" class="control-label">Locality/Habitation Name:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('locality', $student->locality) }}" 
				id="locality" name="locality">

			{!! $errors->first('locality', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('name_of_guardian') ? ' has-error' : '' }}">
			<label for="name_of_guardian" class="control-label">Name of Guardian:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('name_of_guardian', $student->name_of_guardian) }}" 
				id="name_of_guardian" name="name_of_guardian">

			{!! $errors->first('name_of_guardian', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('address_of_guardian') ? ' has-error' : '' }}">
			<label for="address_of_guardian" class="control-label">Address of Guardian:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('address_of_guardian', $student->address_of_guardian) }}" 
				id="address_of_guardian" name="address_of_guardian">

			{!! $errors->first('address_of_guardian', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('is_homeless') ? ' has-error' : '' }}">
			<label for="is_homeless" class="control-label">Whether the child is homeless</label>
			<select class="form-control" 
				id="is_homeless" name="is_homeless">
				<option value="0"{{ old('is_homeless', optional($student)->is_homeless) == '0' ? 'selected' : '' }}>
					No
				</option>
				<option value="1"{{ old('is_homeless', optional($student)->is_homeless) == '1' ? 'selected' : '' }}>
					Yes
				</option>
			</select>

			{!! $errors->first('is_homeless', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div> <!-- ./row	 -->

<div>
    <h4><span aria-hidden="true" class="glyphicon glyphicon-education"></span> Education Details:</h4>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('last_examination') ? ' has-error' : '' }}">
			<label for="last_examination" class="control-label">Last Examinition</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('last_examination', $student->last_examination) }}" 
				id="last_examination" name="last_examination">

			{!! $errors->first('last_examination', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	@if(!$isEdit)
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('total_marks') ? ' has-error' : '' }}">
			<label for="total_marks" class="control-label">Total Marks:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('total_marks', $student->total_marks) }}" 
				id="total_marks" name="total_marks" @keyup="calculatePercentage">

			{!! $errors->first('total_marks', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('marks_obtained') ? ' has-error' : '' }}">
			<label for="marks_obtained" class="control-label">Marks Obtained:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('marks_obtained', $student->marks_obtained) }}" 
				id="marks_obtained" name="marks_obtained" @keyup="calculatePercentage">

			{!! $errors->first('marks_obtained', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	@endif
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('percentage_of_marks_obtained') ? ' has-error' : '' }}">
			<label for="percentage_of_marks_obtained" class="control-label">&#37; Marks Obtained:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('percentage_of_marks_obtained', $student->percentage_of_marks_obtained) }}" 
				id="percentage_of_marks_obtained" name="percentage_of_marks_obtained">

			{!! $errors->first('percentage_of_marks_obtained', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	@if($isEdit) 
		<div class="col-md-3">&nbsp;</div>
		<div class="col-md-3">&nbsp;</div>
	@endif
</div> <!-- ./row -->

<div>
    <h4><span aria-hidden="true" class="glyphicon glyphicon-credit-card"></span> Bank Details:</h4>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('bank_account_number') ? ' has-error' : '' }}">
			<label for="bank_account_number" class="control-label">Account Number</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('bank_account_number', $student->bank_account_number) }}" 
				id="bank_account_number" name="bank_account_number">

			{!! $errors->first('bank_account_number', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('bank_name') ? ' has-error' : '' }}">
			<label for="bank_name" class="control-label">Bank Name:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('bank_name', $student->bank_name) }}" 
				id="bank_name" name="bank_name">

			{!! $errors->first('bank_name', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('branch') ? ' has-error' : '' }}">
			<label for="branch" class="control-label">Branch:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('branch', $student->branch) }}" 
				id="branch" name="branch">

			{!! $errors->first('branch', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('ifsc') ? ' has-error' : '' }}">
			<label for="ifsc" class="control-label">IFSC Code:</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('ifsc', $student->ifsc) }}" 
				id="ifsc" name="ifsc">

			{!! $errors->first('ifsc', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div> <!-- ./row -->

<div>
    <h4><span aria-hidden="true" class="glyphicon glyphicon-hand-right"></span> Others Details:</h4>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('is_bpl') ? ' has-error' : '' }}">
			<label for="is_bpl" class="control-label">Whether Belongs to BPL</label>
			<select class="form-control" 
				id="is_bpl" name="is_bpl">
				<option value="0"{{ old('is_bpl', optional($student)->is_bpl) == '0' ? 'selected' : '' }}>
					No
				</option>
				<option value="1"{{ old('is_bpl', optional($student)->is_bpl) == '1' ? 'selected' : '' }}>
					Yes
				</option>
			</select>

			{!! $errors->first('is_bpl', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('is_disadvantage_group') ? ' has-error' : '' }}">
			<label for="is_disadvantage_group" class="control-label">Belongs to Disadvantaged Group</label>
			<select class="form-control" 
				id="is_disadvantage_group" name="is_disadvantage_group">
				<option value="0"{{ old('is_disadvantage_group', optional($student)->is_disadvantage_group) == '0' ? 'selected' : '' }}>
					No
				</option>
				<option value="1"{{ old('is_disadvantage_group', optional($student)->is_disadvantage_group) == '1' ? 'selected' : '' }}>
					Yes
				</option>
			</select>

			{!! $errors->first('is_disadvantage_group', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('is_getting_free_education') ? ' has-error' : '' }}">
			<label for="is_getting_free_education" class="control-label">Getting Free Education(Private Inst.)</label>
			<select class="form-control" 
				id="is_getting_free_education" name="is_getting_free_education">
				<option 
					value="0"{{ old('is_getting_free_education', optional($student)->is_getting_free_education) == '0' ? 'selected' : '' }}>
					No
				</option>
				<option 
					value="1"{{ old('is_getting_free_education', optional($student)->is_getting_free_education) == '1' ? 'selected' : '' }}>
					Yes
				</option>
			</select>

			{!! $errors->first('is_getting_free_education', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('type_of_disability') ? ' has-error' : '' }}">
			<label for="type_of_disability" class="control-label">Type of Disability*(If any)</label>
			<select class="form-control" 
				id="type_of_disability" name="type_of_disability">
				<option value="na"{{ old('type_of_disability') == 'na' ? 'selected' : '' }}>
					NA
				</option>
				<option value="visual(blindness)"{{ old('type_of_disability', optional($student)->type_of_disability) == 'visual(blindness)' ? 'selected' : '' }}>
					Visual(Blindness)
				</option>
				<option value="visual(low-vision)"{{ old('type_of_disability', optional($student)->type_of_disability) == 'visual(low-vision)' ? 'selected' : '' }}>
					Visual(Low-Vision)
				</option>
				<option value="hearing impaired"{{ old('type_of_disability', optional($student)->type_of_disability) == 'hearing impaired' ? 'selected' : '' }}>
					Hearing Impaired
				</option>
				<option value="speech"{{ old('type_of_disability', optional($student)->type_of_disability) == 'speech' ? 'selected' : '' }}>
					Speech
				</option>
				<option value="locomotor"{{ old('type_of_disability', optional($student)->type_of_disability) == 'locomotor' ? 'selected' : '' }}>
					Locomotor
				</option>
				<option value="mental retardating"{{ old('type_of_disability', optional($student)->type_of_disability) == 'mental retardating' ? 'selected' : '' }}>
					Mental Retardating
				</option>
				<option value="learning disability"{{ old('type_of_disability', optional($student)->type_of_disability) == 'learning disability' ? 'selected' : '' }}>
					Learning disability
				</option>
				<option value="cerebal palsy"{{ old('type_of_disability', optional($student)->type_of_disability) == 'cerebal palsy' ? 'selected' : '' }}>
					Cerebal Palsy
				</option>
			</select>

			{!! $errors->first('type_of_disability', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div><!-- ./row -->

<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('kanyashree_id') ? ' has-error' : '' }}">
			<label for="kanyashree_id" class="control-label">Kanyashree Id</label>
			<input type="text" 
				class="form-control" 
				value="{{ old('kanyashree_id', $student->kanyashree_id) }}" 
				id="kanyashree_id" name="kanyashree_id">

			{!! $errors->first('kanyashree_id', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="col-md-3">&nbsp;</div>
	<div class="col-md-3">&nbsp;</div>
	<div class="col-md-3">&nbsp;</div>
</div> <!-- ./row -->

<div class="row">
	<div class="col-md-12 text-center">
		<button type="submit" class="btn btn-primary">
			Save
		</button>
		<a href="{{ route('students.index') }}" class="btn btn-default" role="button">Cancel</a>
	</div>
</div> <!-- ./row -->