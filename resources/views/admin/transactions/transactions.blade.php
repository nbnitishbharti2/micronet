@php
use App\Model\User;
use App\Model\BookingTransaction;

$partners=User::getAllPartners();
$settle_status=BookingTransaction::settleStatus(); 
@endphp
		


@extends('admin.layouts.app')
@section('content')



<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		{{-- Include Header --}}  
		@include('admin.layouts.navbar')
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<h1>View Transactions</h1>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 right-align">
							<a href="{!! url('/') !!}" class="btn btn-success"><i class="fa fa-arrow-left"></i> &nbsp; Back</a>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<!-- left column -->
						<div class="col-12">
							<!-- general form elements -->
							<div class="card">
								<!-- /.card-header -->
								<div class="card-body">
									<div class="table-responsive">
										<form action="{{ route('admin.transactions') }}" method="get" id="transactionsForm">
											<div class="row" style="margin-bottom:30px;">

												<div class="short_by new-filter col-sm-2"> 
													<label>Partner</label>
													<select id="partner" name="partner" class="form-control">
														<option value="">Choose Partner</option>
														@if($partners->count())
															@foreach($partners as $key=>$value)
																<option value="{{$key}}" {{ (request()->get('partner')== $key)?'selected':'' }}>{{ $value }}</option>
															@endforeach
														@endif 
													</select>
												</div>

												<div class="short_by new-filter col-sm-2"> 
													<label>Settle Status</label>
													{{-- dd(count($settle_status)) --}}
													<select id="settle_status" name="settle_status" class="form-control">
														<option value="">Choose Settle Status</option>
														@if(count($settle_status))
															@foreach($settle_status as $key=>$value)
																<option value="{{$key}}" {{ (request()->get('settle_status')== $key)?'selected':'' }}>{{ $value }}</option>
															@endforeach
														@endif 
													</select>
												</div>

												<div class="short_by new-filter col-sm-3"> 
													<label>From</label>
													<input type="date" name="date1" class="form-control">
												</div>

												<div class="short_by new-filter col-sm-3"> 
													<label>To</label>
													<input type="date" name="date2" class="form-control">
												</div>

												<div class="short_by new-filter col-sm-2"> 
													<input type="submit" name="submit" value="Submit"class="form-control btn btn-success" style="margin-top:32px;">
												</div>

											</div>

										</form>

										<table id="table" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>Serial No</th>
													<th>User</th>
													<th>Booking Address</th>
													<th>Partner</th>
													<th>Payment Mode</th>
				                                    <th>Payment 2</th>
				                                    <th>Settle Status</th>
				                                    <th>Amount</th>
													<th>Created</th>
												</tr>
											</thead>
											<tbody>
												@php $i = 0; @endphp
												@foreach($transactions as $item)
													<tr>
														<td>{!! ++$i !!}</td>
														<td>{!! $item->user->name !!}</td>
				                                        <td>{!! $item->booking->address !!}</td>
				                                        <td>{!! $item->partner->name !!}</td>
				                                        <td>{!! $item->payment_mode !!}</td>
				                                        <td>{!! $item->payment_2 !!}</td>
				                                        <td>
				                                        	@if($item->settle_status == '1')
				                                        	Settled
				                                        	@else
				                                        	Unsettled
				                                    		@endif
				                                		</td>
				                                        <td>{!! $item->amount !!}</td>
														<td>{!! Carbon\Carbon::parse($item->created_at)->format(config('app.date_time_format')) !!}</td>
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
								<!-- /.card-body -->
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<!-- /.content-wrapper -->
		@include('admin.layouts.footer')

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	



@endsection
@section('script') 

<script src="{{ asset('public/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function () {
	  	bsCustomFileInput.init();
	});
</script>



@endsection

