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
							<h1>View Unsettle Transactions To Partner</h1>
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
										<table id="table" class="table table-bordered table-striped">
											<tbody>
												<form action="{{ route('admin.settleTransactions')}}" method="post">
												@csrf
													<tr>
														<th>Partner</th>
														<td>{!! $partner_name['name'] !!}
															<input type="hidden" name="partner_id" value="{{$partner_id}}">
														</td>
													</tr>
													<tr>
														<th>Total Unsettled Amount</th>
														<td>{!! $total_unsettled_amount !!}
															<input type="hidden" name="total_unsettled_amount" value="{{$total_unsettled_amount}}">
														</td>
													</tr>
													<tr>
														<th>Total Unsettled Amount To Partner</th>
														<td>{!! $total_unsettled_amount_to_partner !!}
															<input type="hidden" name="total_unsettled_amount_to_partner" value="{{$total_unsettled_amount_to_partner}}">
															<input type="hidden" name="total_unsettled_amount_to_admin" value="{{$total_unsettled_amount_to_admin}}">
														</td>
													</tr>
													<!-- <tr>
														<th>Total Unsettled Amount To Admin</th>
														
															
														</td>
													</tr> -->
													<tr>
														<th>Total Commission</th>
														<td>{!! $total_commission !!}
															<input type="hidden" name="total_commission" value="{{$total_commission}}">
														</td>
													</tr>
													<tr>
														<th>Payment Flow</th>
														<td>{!! $payment_flow_type !!} 
														
															@php
															if($payment_flow_type == 'Cr')
															$payment_flow = $payment_flow *(-1);
															@endphp
															{!! $payment_flow !!} 
															<input type="hidden" name="payment_flow_type" value="{{$payment_flow_type}}">
															<input type="hidden" name="payment_flow" value="{{$payment_flow}}">
															<input type="hidden" name="ids" value="{{$ids}}">
														</td>
													</tr>
													<tr>
														<td colspan="2">
															<input type="submit" name="submit" value="Settle" class="btn btn-success" style="float:right;">
														</td>
													</tr>
												</form>		
												
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

