@extends('Layout.app')
@section('content')


@section('page_title')
@parent
<h1 class="page-title">New Orders</h1>
    @section('breadcrumb')
    @parent
    <li>New Orders</li>
    @endsection
@endsection


<!-- - - - - - - - - - - - - - start Content - - - - - - - - - - - - - - - - -->

<!-- how it works page -->
<section class="p-0">
    <div class="container">
        <div class="overview-menu">
            <div class="filters">
                <div class="school-title">
                    <a href="{{ url('/') }}" class="logo"><img src="{{ asset('public/images/b-logo.png') }}" alt="Logo"></a>
                </div>
                @include('elements.dashboard_left_menu')
            </div>
            
            
            <!-- My Orders starts here -->
            
            <div class="contain_section">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-heading">New Orders</h1>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <br/>
                        <!-- <a href="" class="ar-btn float-right">Add Property</a>
                        <br/><br/> -->
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Service</th>
                                  <th scope="col">Service Plan</th>
                                  <th scope="col">Address</th>
                                  <th scope="col">Amount</th>
                                  <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($new_orders->count())
                                    @php $slNo =  $new_orders->firstItem() @endphp
                                    @foreach($new_orders as $new_order)
                                    <tr>
                                       <th scope="row">{{ $slNo++ }}</th>
                                       <td>{{ $new_order->service->name }}</td>
                                       <td>{{ $new_order->service_plan->name }}</td>
                                       <td>{{ $new_order->address }}</td>
                                       <td>{{ $new_order->amount }}</td>
                                       <td>
                                        <a href="{{ route('paymentComplete', ['id'=>$new_order->id]) }}" class="btn btn-primary">Payment</a>
                                        <a href="{{ route('complete', ['id'=>$new_order->id]) }}" class="btn btn-primary">Complete</a>
                                       </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="5">No Record Found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-right" id="bs4-table_paginate">
                                    {!! $new_orders->links() !!}
                                </div>
                            </div>
                        </div>
                        
                    </div> 
                </div>
            </div>
            
            <!-- My Orders ends here -->


        </div>
    </div>
</section>

<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->

@endsection