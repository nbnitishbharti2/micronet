@php
use App\Model\User;
$partner_list = User::getAllPartners();
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
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<h1>View Unsettled Transactions</h1>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 right-align">
							<!-- </div class="col-sm-6"> -->
								<form action="{{ route('admin.settle') }}" method="POST">
								@csrf
									<div class="short_by new-filter col-sm-4"> 
									<select name="partner_id" class="form-control" id="partner_id">
										<option value="">Choose Partner</option>
										@foreach($partner_list as $key=>$value)
											<option value="{!! $key !!}" {{ ( $key ==  old('partner_id') ) ? 'selected' : '' }}>{!! $value !!}</option>
										@endforeach
									</select>
									@if($errors->has('partner_id'))
										<span class="alert-notice" role="alert">
			                                <strong>{{ $errors->first('partner_id') }}</strong>
			                            </span>
			                        @endif
									</div>
									<input type="submit" name="submit" value="Settle" class="form-control col-sm-2 btn btn-success">
								</form>
							<!-- </div> -->


							<a href="{!! url('/') !!}" class="btn btn-success col-sm-2"><i class="fa fa-arrow-left"></i> &nbsp; Back</a>
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
@endsection

