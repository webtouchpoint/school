{{ csrf_field() }}

<div class="form-group{{ $errors->has('accounts_head_id') ? ' has-error' : '' }}">
	<label for="accounts_head_id" class="col-md-4 control-label">Select Accounts Head:</label>
	 <div class="col-md-6">

		<select class="form-control" 
			id="accounts_head_id" 
			name="accounts_head_id">
			<option selected disabled>Pick Accounts Head...</option>
			@foreach($accountsHeads as $accountsHead)
				<option 
					value="{{ $accountsHead->id }}"{{ old('accounts_head_id', $accountsTransaction->accounts_head_id) == $accountsHead->id ? ' selected' : '' }}>
						{{ $accountsHead->accounts_head }}
				</option>
			@endforeach
		</select>

		{!! $errors->first('accounts_head_id', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('purpose') ? ' has-error' : '' }}">
	<label for="purpose" class="col-md-4 control-label">Purpose:</label>
	 <div class="col-md-6">
		<textarea class="form-control" 
			id="purpose" 
			name="purpose"
			rows="4">{{ old('purpose', $accountsTransaction->purpose) }}</textarea>

		{!! $errors->first('purpose', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
	<label for="amount" class="col-md-4 control-label">Amount:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control" 
			value="{{ old('amount', $accountsTransaction->amount) }}" 
			id="amount" name="amount">

		{!! $errors->first('amount', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('mode') ? ' has-error' : '' }}">
	<label for="mode" class="col-md-4 control-label">Payment mode:</label>
	 <div class="col-md-6">
		<select class="form-control" id="mode" name="mode">
			<option selected disabled>Pick a payment mode...</option>
			<option 
				value="Cash"{{ old('mode', $accountsTransaction->mode) == 'Cash' ? ' selected' : '' }}>
				Cash
			</option>
			<option 
				value="DD"{{ old('mode', $accountsTransaction->mode) == 'DD' ? ' selected' : '' }}>
				DD
			</option>
			<option 
				value="Cheque"{{ old('mode', $accountsTransaction->mode) == 'Cheque' ? ' selected' : '' }}>
				Cheque
			</option>
		</select>

		{!! $errors->first('mode', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
	<label for="remark" class="col-md-4 control-label">Remark:</label>
	 <div class="col-md-6">
		<textarea class="form-control" 
			id="remark" 
			name="remark"
			rows="3">{{ old('remark', $accountsTransaction->remark) }}</textarea>

		{!! $errors->first('remark', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>&nbsp;<a href="{{ route('accounts-transactions.index') }}" class="btn btn-default" role="button">Cancel</a>
    </div>
</div>