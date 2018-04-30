{{ csrf_field() }}

<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
	<label for="category" class="col-md-4 control-label">Accounts Category:</label>
	 <div class="col-md-6">
	 	<select class="form-control"  
			id="category" name="category">
	 		 <option selected disabled>Choose a category...</option>
	 		 <option 
	 		 	value="income"{{ old('category', optional($accountsHead)->category) == 'income' ? 'selected' : '' }}>
 		 			Income
	 		 	</option>
	 		 <option 
	 		 	value="expenditure"{{ old('category', optional($accountsHead)->category) == 'expenditure' ? ' selected' : '' }}>
	 		 		Expenditure
	 		 </option>
	 	</select>

		{!! $errors->first('category', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('accounts_head') ? ' has-error' : '' }}">
	<label for="accounts_head" class="col-md-4 control-label">Accounts Head:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control" 
			value="{{ old('accounts_head', $accountsHead->accounts_head) }}" 
			id="accounts_head" name="accounts_head">

		{!! $errors->first('accounts_head', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
	<label for="is_active" class="col-md-4 control-label">Accounts Head Status:</label>
 	<div class="col-md-6">
		<label class="radio-inline">
			<input type="radio" name="is_active" value="1" {{ old('is_active', optional($accountsHead)->is_active) == 1 ? ' checked' : '' }}>Active
		</label>
		<label class="radio-inline">
			<input type="radio" name="is_active" value="0"{{ old('is_active', optional($accountsHead)->is_active) == 0 ? ' checked' : '' }}>Inactive
		</label>

		{!! $errors->first('is_active', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>&nbsp;<a href="{{ route('accounts-heads.index') }}" class="btn btn-default" role="button">Cancel</a>
    </div>
</div>