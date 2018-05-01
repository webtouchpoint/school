<!DOCTYPE html>
<html>
<head>
<title>Print</title> 
		<style>
		*{font-family:verdana; font-size:15px;}
		table.fancy {  font-size:15px; background: whitesmoke;  border-collapse: collapse;  width:98%;  margin:0 auto;  margin-bottom:10px; margin-top:10px;}
		//table.fancy tr:hover {   background: lightsteelblue !important;}
		table.fancy th, table.fancy td {  border: 1px silver solid;  padding: 0.2em;  padding-left:10px; vertical-align:top}
		table.fancy th {  background: gainsboro;  text-align: left;}
		table.fancy caption {  margin-left: inherit;  margin-right: inherit;}
		table.fancy tr:hover{background-color:#ddd;}
		</style>
</head>
<body>
	<center>
		<div  style="width:100%">
			<h1 style='margin:0px'><center>{{ strtoupper($school->name) }}</center></h1>
			<h3 style='margin:0px'><center>{{ strtoupper($school->address_line1) }}, {{ strtoupper($school->address_line2) }}, {{ strtoupper($school->dist) }}, {{ strtoupper($school->state) }},{{ strtoupper($school->pin) }}</center></h3>
			<h3 style='margin:0px'><center>{{ $school->phone }}</center></h3>
			<h3 style='margin:0px'><center>{{ $school->email }}</center></h3>
			<h1><center>FEE PAYMENT RECIEPT</center></h1>
			<table cellspacing="0" class="table table-small-font table-bordered table-striped fancy" >
				<tr>
					<th>Reciept No</th><td> {{ $accountsTransaction->id }}</td>
					<th>Date Time of Payment</th><td>{{ $accountsTransaction->created_at->format("d-m-Y H:i A") }}</td>
				</tr>
				<tr>
					<th>Student Name</th><td> {{ $academicInfo->student->name }}</td>
					<th>Admission No</th><td>{{ $academicInfo->id }}</td>
				</tr>
				<tr>
					<th>Mother Name</th><td>{{ $academicInfo->student->mothers_name }}</td>
					<th>Father Name</th><td>{{ $academicInfo->student->fathers_name }}</td>
				</tr>
				<tr>
					<th>Class</th><td>{{ $academicInfo->schoolClass->name }}</td>
					<th>Section</th><td>{{ $academicInfo->section->name }}</td>
				</tr>
				<tr>
					<th>Mobile</th><td>{{ $academicInfo->student->mobile }}</td>
				</tr>
				 <tr>
					<th colspan='2'>Fees Heading</th><th colspan='2'>Amount</th>
				</tr>
				@foreach($transactions as $transaction)
					<tr>
						<td colspan='2'>{{ $transaction->feesStructure->fees_heading }}</td>
						<td colspan='2'>{{ $transaction->amount }}</td>
					</tr>
				@endforeach
				<tr>
					<th colspan='2'>Total</th><th colspan='2'>{{ $accountsTransaction->amount }}</th>	 
				</tr>
			</table>
			<p style="float:left">Printed On: {{ date("d-m-Y H:i A") }} </br>Computer Generated Copy</p>
			<p style="float:right;font-size:15px">Cashier Sign</p>
		</div>	
	</center>
</body>
<script type="text/javascript">
	function printPage() {
		window.print();
	}
</script>
</body>
</html>