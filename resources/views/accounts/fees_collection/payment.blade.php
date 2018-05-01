@extends('layouts.app', [
	'vueView' => 'fees-payment-form-view'
])

@section('title')
    Fee Payment
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
      <div class="col-md-12">
        <h3>Payment <small>&raquo; Pay fees</small></h3>
      </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Fee Payment Form
                @endslot
               	<form class="form-horizontal" method="POST" action="{{ route('acconts.fees-collection.payment') }}">

               		{{ csrf_field() }}

					<div class="form-group{{ $errors->has('session') ? ' has-error' : '' }}">
						<label for="session" class="col-md-4 control-label">Choose a session:</label>
						 <div class="col-md-6">

							<select class="form-control" id="session" name="session">
								<option selected disabled>Pick a session...</option>
								@foreach($schoolSessions as $schoolSession)
									<option 
										value="{{ $schoolSession->id }}" {{ old('session') == $schoolSession->id ? 'selected' : '' }}
										{{ $schoolSession->is_current == 1 ? 'selected' : ''}}>
											{{ $schoolSession->session }}
									</option>
								@endforeach
							</select>

							{!! $errors->first('session', '<span class="help-block">:message</span>') !!}
						</div>
					</div>

					<div class="form-group{{ $errors->has('school_class_id') ? ' has-error' : '' }}">
						<label for="name" class="col-md-4 control-label">Select Class:</label>
						 <div class="col-md-6">
						    <select class="form-control" id="school_class_id" name="school_class_id" @change="onClassChange">
						        <option selected disabled>Pick a class...</option>
						        @if (count($schoolClasses) > 0) 
						            @foreach ($schoolClasses as $schoolClass)
						                <option 
						                	value="{{ $schoolClass->id }}"
						                	{{ old('school_class_id') == $schoolClass->id ? ' selected' : '' }}>
						                		{{ $schoolClass->name}}
						            	</option>
						            @endforeach
						        @endif
						    </select>

							{!! $errors->first('school_class_id', '<span class="help-block">:message</span>') !!}
						</div>
					</div>

					<div class="form-group{{ $errors->has('academicInfo_id') ? ' has-error' : '' }}" v-if="showStudent">
					    <label for="group" class="col-md-4 control-label">Select Student:</label>
					    <div class="col-md-6">
						    <select class="form-control" id="academicInfo_id" name="academicInfo_id" @change="onStudentChange">
						    	<option selected disabled>Choose a student...</option>
						        @if(old('academicInfo_id'))
						            <option v-for="academicInfo in academicInfos"
						                :value="academicInfo.id" 
						                v-text="academicInfo.id + ' - ' + academicInfo.name"
						          		:selected="{{ json_encode(old('academicInfo_id')) }} == academicInfo.id ? true : false"></option>
						        @else
						            <option v-for="academicInfo in academicInfos" 
						            	:value="academicInfo.id" 
						            	v-text="academicInfo.id + ' - ' + academicInfo.name"></option>
						        @endif
					    	</select>
					    	{!! $errors->first('academicInfo_id', '<span class="help-block">:message</span>') !!}
						</div>
					</div>

					<div v-if="showFees">
						<div class="text-center" v-if="fees.length == 0">
							<h3>No Due Fees</h3>
						</div>
						<table class="table table-bordered" v-if="fees.length">
							<thead>
								<th class="text-center">#</th>
								<th class="text-center">Sl No.</th>
								<th class="text-center">Fee Heading</th>
								<th class="text-center">Amount</th>
							</thead>
							<tbody>
								<tr v-for="(fee, index) in fees">
									<th class="text-center">
										<input type="checkbox" name="fees_structures[]" 
											:value="fee.id" 
											@click="onFeesCheck($event, fee.amount)">
									</th>
								    <td>
								      @{{ index + 1 }}
								    </td>
    							    <td>
								      @{{ fee.fees_heading }}
								    </td>
								    <td>
								     	@{{ fee.amount }}
								    </td>
								 </tr>
							</tbody>
						</table>
					</div>

					<div v-show="total > 0">
						<table class="table">
							<tbody>
								<tr>
									<td>
										<b>Total:</b>
									</td>
									<td class="text-center">
										&#8377; <b>@{{ total }}</b>
										<input type="hidden" id="amount" name="amount" :value="total">
									</td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="form-group" v-show="total > 0">
						 <div class="col-md-6">
							<textarea class="form-control" 
								id="remarks" 
								name="remarks"
								rows="5"
								placeholder="Remarks"></textarea>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="mode" name="mode" @change="onAccountsHeadAndPaymentModeChange">
								<option selected disabled>Payment mode...</option>
								<option value="Cash">Cash</option>
								<option value="DD">DD</option>
								<option value="Cheque">Cheque</option>
							</select>
						</div>
					</div>

					<div class="form-group{{ $errors->has('accounts_head_id') ? ' has-error' : '' }}" v-show="total > 0">
						<label for="accounts_head_id" class="col-md-4 control-label">Select Accounts Head:</label>
						 <div class="col-md-6">

							<select class="form-control" 
								id="accounts_head_id" 
								name="accounts_head_id" @change="onAccountsHeadAndPaymentModeChange">
								<option selected disabled>Pick Accounts Head...</option>
								@foreach($accountsHeads as $accountsHead)
									<option 
										value="{{ $accountsHead->id }}"{{ old('accounts_head_id') == $accountsHead->id ? ' selected' : '' }}>
											{{ $accountsHead->accounts_head }}
									</option>
								@endforeach
							</select>

							{!! $errors->first('accounts_head_id', '<span class="help-block">:message</span>') !!}
						</div>
					</div>

					<div class="form-group" v-show="showSubmitButton && total > 0">
					    <div class="col-md-6 col-md-offset-4">
					        <button type="submit" class="btn btn-primary">Pay</button>&nbsp;<a href="/" class="btn btn-default" role="button">Cancel</a>
					    </div>
					</div>
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection