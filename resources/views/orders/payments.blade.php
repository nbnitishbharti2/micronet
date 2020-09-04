@extends('Layout.app')
@section('content')


@section('page_title')
@parent
<h1 class="page-title">Payments</h1>
    @section('breadcrumb')
    @parent
    <li>Payments</li>
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
                        <h1 class="page-heading">Payments</h1>
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
                                  <!-- <th scope="col">User</th>
                                  <th scope="col">Service</th>
                                  <th scope="col">Service Plan</th> -->
                                  <th scope="col">Payment Mode</th>
                                  <th scope="col">Settle Status</th>
                                  <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($payments->count())
                                    @php $slNo =  $payments->firstItem() @endphp
                                    @foreach($payments as $payment)
                                    <tr>
                                       <th scope="row">{{ $slNo++ }}</th>
                                       <!-- <td>{{-- $payment->user->name --}}</td>
                                       <td>{{-- $payment->booking->service->name --}}</td>
                                       <td>{{-- $payment->booking->service_plan->name --}}</td> -->
                                       <td>{{ $payment->payment_mode }}</td>
                                       <td>
                                            @if($payment->settle_status == '1')
                                                Settled
                                            @else
                                                Unsettled
                                            @endif
                                       </td>
                                       <td>{{ $payment->amount }}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="7">No Record Found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-right" id="bs4-table_paginate">
                                    {!! $payments->links() !!}
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