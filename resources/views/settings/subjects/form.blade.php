{{ csrf_field() }}

<div class="form-group{{ $errors->has('school_class_id') ? ' has-error' : '' }}">
	<label for="name" class="col-md-4 control-label">Select Class:</label>
	 <div class="col-md-6">
	    <select class="form-control" id="school_class_id" name="school_class_id" @change="onClassChange">
	        <option selected disabled>Choose a class...</option>
	        @if (count($schoolClasses) > 0) 
	            @foreach ($schoolClasses as $schoolClass)
	                <option 
	                	value="{{ $schoolClass->id }}"
	                	{{ old('school_class_id', optional($subject->schoolClass)->id) == $schoolClass->id ? ' selected' : '' }}>
	                		{{ $schoolClass->name}}
	            	</option>
	            @endforeach
	        @endif
	    </select>

		{!! $errors->first('school_class_id', '<span class="help-block">:message</span>') !!}
	</div>
</div>

 <div class="form-group{{ $errors->has('subject_group_id') ? ' has-error' : '' }}" v-if="showSubjectGroup">
    <label for="group" class="col-md-4 control-label">Select Group:</label>
    <div class="col-md-6">
	    <select class="form-control" id="subject_group_id" name="subject_group_id">
	    	<option selected disabled>Choose a group...</option>
	        @if(old('subject_group_id', optional($subject->subjectGroup)->id))
	            <option v-for="subjectGroup in subjectGroups"
	                :value="subjectGroup.id" 
	                v-text="subjectGroup.name"
	          		:selected="{{ json_encode(old('subject_group_id', optional($subject->subjectGroup)->id)) }} == subjectGroup.id ? true : false"></option>
	        @else
	            <option v-for="subjectGroup in subjectGroups" :value="subjectGroup.id" v-text="subjectGroup.name"></option>
	        @endif
    	</select>
    	{!! $errors->first('subject_group_id', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	<label for="name" class="col-md-4 control-label">Name:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control" 
			value="{{ old('name', $subject->name) }}" 
			id="name" name="name">

		{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
	<label for="code" class="col-md-4 control-label">Code:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control" 
			value="{{ old('code', $subject->code) }}" 
			id="code" name="code">

		{!! $errors->first('code', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
	<label for="description" class="col-md-4 control-label">Description:</label>
	 <div class="col-md-6">
		<textarea class="form-control" 
			id="description" 
			name="description"
			rows="5">{{ old('description', $subject->description) }}</textarea>

		{!! $errors->first('description', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
        	Save
        </button>
        <a href="{{ route('subjects.index') }}" class="btn btn-default" role="button">Cancel</a>
    </div>
</div>