@extends('Layout.app')
@section('content')


@section('page_title')
@parent
<h1 class="page-title">Services</h1>
    @section('breadcrumb')
    @parent
    <li>Services</li>
    @endsection
@endsection

<!-- - - - - - - - - - - - - start Content - - - - - - - - - - - - - - - -->

<section style="margin:50px 100px;">
    <h1><span itemprop="serviceType" style="display: block;text-align:center;">{{ $category->name }}</span> <!-- style="display: none;" -->  </h1>

    @foreach($category->sub_category as $sub_category)
    <div class="">
        <h2 class="card-head">{{ count($sub_category->service) ?  $sub_category->name : '' }}</h2>
        <!-- <span itemprop="name" style="display: none;">Home Cleaning Packages</span> -->
        <ul class="category-subservice-list">

            @foreach($sub_category->service as $service)
            <li class=" hoverable valign-wrapper">
                <a href="{{ route('getServiceDetail',$service->id) }}">
                    <img itemprop="image" src="{{ asset('public/service_image/'.$service->image) }}" alt="" class="circle">
                    <!-- <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Offer"> -->
                        <span>
                            <h3 itemprop="name">{{ $service->name }}</h3>
                            <!-- <span itemprop="description" style="display: none;"></span> -->
                        </span>
                    <!-- </span> -->

                    <p class="marginMuted" style="margin-top:10px;">
                    <span style="padding:2px;">₹3600</span>
                    </p>
                </a>
            </li>
            @endforeach

        </ul>
    </div>
    @endforeach

</section>


<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->
@endsection