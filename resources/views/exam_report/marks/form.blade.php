{{ csrf_field() }}

<div class="form-group{{ $errors->has('examination_id') ? ' has-error' : '' }}">
	<label for="name" class="col-md-4 control-label">Select Examination:</label>
	 <div class="col-md-6">
	    <select class="form-control" id="examination_id" name="examination_id">
	        <option selected disabled>Choose an Examination...</option>
	        @if (count($examinations) > 0) 
	            @foreach ($examinations as $examination)
	                <option 
	                	value="{{ $examination->id }}"
	                	{{ old('examination_id', optional($marks->examination)->id) == $examination->id ? ' selected' : '' }}>
	                		{{ $examination->name}}
	            	</option>
	            @endforeach
	        @endif
	    </select>

		{!! $errors->first('examination_id', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('school_class_id') ? ' has-error' : '' }}">
	<label for="name" class="col-md-4 control-label">Select Class:</label>
	 <div class="col-md-6">
	    <select class="form-control" id="school_class_id" name="school_class_id" @change="onClassChange">
	        <option selected disabled>Choose a class...</option>
	        @if (count($schoolClasses) > 0) 
	            @foreach ($schoolClasses as $schoolClass)
	                <option 
	                	value="{{ $schoolClass->id }}"
	                	{{ old('school_class_id', optional($marks->schoolClass)->id) == $schoolClass->id ? ' selected' : '' }}>
	                		{{ $schoolClass->name}}
	            	</option>
	            @endforeach
	        @endif
	    </select>

		{!! $errors->first('school_class_id', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div v-if="showSubject">
	<hr>

	<div v-for="subject in subjects" class="form-group">
		<label for="marks" class="col-md-4 control-label">@{{ subject.name }} </label>
		 <div class="col-md-6">
			<input type="text" 
				:name="'subjects['+subject.id+']'"
				class="form-control" 
				value="0">
		</div>
	</div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
        	Save
        </button>
        <a href="{{ route('marks.index') }}" class="btn btn-default" role="button">Cancel</a>
    </div>
</div>