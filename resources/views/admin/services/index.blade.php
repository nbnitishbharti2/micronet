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
							<h1>View Services</h1>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 right-align">
							<a href="{!! url('/') !!}" class="btn btn-success"><i class="fa fa-arrow-left"></i> &nbsp; Back</a>
							{{-- @if(Helper::checkPermission('add-category')) --}}
							<a href="{!! route('admin.add.services') !!}" class="btn btn-primary"><i class="fa fa-plus"></i>  &nbsp; Add</a>
							{{-- @endif --}}
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
													<th>Name</th>
													<th>Price</th>
													<th>Discount</th>
													<th>New Price</th>
													<th>Image</th>
													<th>Created</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@php $i = 0; @endphp
												@foreach($category as $item)
													<tr>
														<td>{!! ++$i !!}</td>
														<td>{!! $item->name !!}</td>
														<td>{!! $item->price !!}</td>
														<td>{!! $item->discount !!}</td>
														<td>{!! $item->new_price !!}</td>
														<td><img src="{{asset('public/service_image/'.$item->image)}}" width="60" height="60" /></td>
														<td>{!! Carbon\Carbon::parse($item->created_at)->format(config('app.date_time_format')) !!}</td>
														<td>
															@if(empty($item->deleted_at))

																{{-- @if(Helper::checkPermission('edit-category')) --}}
																<a href="{!! route('admin.edit.services', $item->id) !!}"  title="Edit" class="btn-sm btn btn-primary"><i class="fa fa-edit"></i>  </a>
																{{-- @endif --}}

																{{-- @if(Helper::checkPermission('delete-category')) --}}
																<button class="btn-sm btn btn-danger" title="Delete" onclick="category_confirm_delete({{ $item->id }})"><i class="fa fa-trash"></i></button>
																{{-- @endif --}}
																
															@else

															    {{-- @if(Helper::checkPermission('delete-category')) --}}
																<button class="btn-sm btn btn-success" title="Restore" onclick="category_confirm_restore({{ $item->id }})"><i class="fa fa-undo"></i></button>
																{{-- @endif --}}
																
															@endif
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
	<!-- /.delete confirmation modal -->
	<div class="modal fade" id="modal-category-delete">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h4 class="modal-title">Delete services</h4>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">
	          <p>Are you sure? You want to Delete services.</p>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	          <a href="{{ url('/admin/delete-services/11') }}" id="delete-category" class="btn btn-primary">Delete</a>
	        </div>
	      </div>
	      <!-- /.modal-content -->
	    </div>
	    <!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
    <!-- /.delete confirmation modal -->
	<div class="modal fade" id="modal-category-restore">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Restore services</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure? You want to Restore services.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <a href="{{ url('/admin/restore-services/11') }}" id="restore-category" class="btn btn-primary">Restore</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
@section('script') 
@endsection

