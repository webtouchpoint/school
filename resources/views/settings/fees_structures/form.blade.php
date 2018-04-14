{{ csrf_field() }}

<div class="form-group{{ $errors->has('school_session_id') ? ' has-error' : '' }}">
	<label for="name" class="col-md-4 control-label">Select Session:</label>
	 <div class="col-md-6">
	    <select class="form-control" id="school_session_id" name="school_session_id">
	        <option selected disabled>Choose a session...</option>
	        @if (count($schoolSessions) > 0) 
	            @foreach ($schoolSessions as $schoolSession)
	                <option 
	                	value="{{ $schoolSession->id }}"
	                	{{ old('school_session_id', optional($feesStructure->schoolSession)->id) == $schoolSession->id ? ' selected' : '' }}>
	                		{{ $schoolSession->session}}
	            	</option>
	            	{{ $schoolSession }}
	            @endforeach
	        @endif
	    </select>

		{!! $errors->first('school_session_id', '<span class="help-block">:message</span>') !!}
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
	                	{{ old('school_class_id', optional($feesStructure->schoolClass)->id) == $schoolClass->id ? ' selected' : '' }}>
	                		{{ $schoolClass->name}}
	            	</option>
	            	{{ $schoolClass }}
	            @endforeach
	        @endif
	    </select>

		{!! $errors->first('school_class_id', '<span class="help-block">:message</span>') !!}
	</div>
</div>

 <div class="form-group{{ $errors->has('fees_category_id') ? ' has-error' : '' }}" v-if="showFeesCategory">
    <label for="group" class="col-md-4 control-label">Select Fees Category:</label>
    <div class="col-md-6">
	    <select class="form-control" id="fees_category_id" name="fees_category_id">
	    	<option selected disabled>Choose a group...</option>
	        @if(old('fees_category_id', optional($feesStructure->feesCategory)->id))
	            <option v-for="feesCategory in feesCategories"
	                :value="feesCategory.id" 
	                v-text="feesCategory.name"
	          		:selected="{{ json_encode(old('fees_category_id', optional($feesStructure->feesCategory)->id)) }} == feesCategory.id ? true : false"></option>
	        @else
	            <option v-for="feesCategory in feesCategories" :value="feesCategory.id" v-text="feesCategory.name"></option>
	        @endif
    	</select>
    	{!! $errors->first('fees_category_id', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	<label for="name" class="col-md-4 control-label">Name:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control" 
			value="{{ old('name', $feesStructure->name) }}" 
			id="name" name="name">

		{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
	<label for="amount" class="col-md-4 control-label">Amount:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control" 
			value="{{ old('amount', $feesStructure->amount) }}" 
			id="amount" name="amount">

		{!! $errors->first('amount', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
	<label for="description" class="col-md-4 control-label">Description:</label>
	 <div class="col-md-6">
		<textarea class="form-control" 
			id="description" 
			name="description"
			rows="5">{{ old('description', $feesStructure->description) }}</textarea>

		{!! $errors->first('description', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('fees-structures.index') }}" class="btn btn-default" role="button">Cancel</a>
    </div>
</div>