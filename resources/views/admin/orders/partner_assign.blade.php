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
							<h1>View Partner Assign</h1>
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

						<div class="col-12">
							<ul>
								<li>User : {!! $booking->user->name !!}</li>
								<li>Mobile : {!! $booking->mobile !!}</li>
								<li>State : {!! $booking->state->name !!}</li>
								<li>City : {!! $booking->city->name !!}</li>
								<li>Zip : {!! $booking->zip !!}</li>
								<li>Address : {!! $booking->address !!}</li>
							</ul>
						</div>


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
													<th>Name</th>
				                                    <th>Mobile</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@php $i = 0; @endphp
												@foreach($users_as_partners as $item)
													<tr>
														<td>{!! ++$i !!}</td>
														<td>{!! $item->name !!}</td>
				                                        <td>{!! $item->mobile !!}</td>
														<td>
															<a href="{{ route('admin.assign', ['booking_id'=>$booking->id, 'partner_id'=>$item->id]) }}" class="btn btn-primary">Assign</a>
																
															
														</td>
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

