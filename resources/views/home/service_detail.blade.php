@php
use App\Model\PriceByCity;
@endphp

@extends('Layout.app')
@section('content')


@section('page_title')
@parent
<h1 class="page-title">Service Detail </h1>
    @section('breadcrumb')
    @parent
    <li>Service Detail</li>
    @endsection
@endsection

<!-- - - - - - - - - - - - - start Content - - - - - - - - - - - - - - - -->


<section style="margin:50px 100px;">
    <h1><span style="display:block;text-align:center;">{{ $service->name }}</span></h1>

    <div class="row">
        <div class="col-md-8">
            <h3>{{ $service->name }}</h3>
            <p>{{ $service->service_description->description }}</p>
            <p>
                <span>Availability :</span> 
                @if($service->service_description->availability == 'Yes')
                <img src="{{ asset('public/images/right.png') }}" width="30" height="30" />
                @else
                <img src="{{ asset('public/images/wrong.png') }}" width="30" height="30" />
                @endif
            </p>
            <p>
                <a href="javascript:void(0);" class="btn book_now_btn float-left" id="book_now" data-service_plan_id="" style="font-size: 13px;padding: 0 5px; min-width: 80px; line-height: 30px; height: 30px;
                        text-transform: uppercase; border:none; border-radius: 30px; font-weight: 400;letter-spacing: 0.5px; color: #fff; transition: all 0.3s ease;
                        background:linear-gradient(to right, #04518c 0%,#00a1d9 33%,#47d9bf 100%);
                        margin-bottom:5px;">Book Now</a> 
            </p>
        </div>
        <div class="col-md-4 service_plan" >
            <h2><span style="display:block;text-align:center;margin-top:20px;">Service Plans</span></h2>

            <ul class="service_plan_ul">
                {{-- @if(!(is_null($service->service_plan))) --}}
                    @foreach($service->service_plan as $service_plan)
                    <li><a href="javascript:void(0);"  class="service_plan" data-service_plan="{{$service_plan->id}}">{{ $service_plan->name }}</a>
                            
                            @if(PriceByCity::getPriceByCity($service->id,$service_plan->id) ) 
                                
                                @php 
                                $price_by_city = PriceByCity::getPriceByCity($service->id,$service_plan->id);
                                @endphp
                                @foreach($price_by_city as $key=>$value)
                                {{-- dd($value) --}}
                                <span id="price_by_city" class="float-right">
                                    <input type="hidden" name="price_by_city_id" id="price_by_city_id-{{$service_plan->id}}" value="{{ $key }}">
                                    <input type="hidden" name="amount" id="amount-{{$service_plan->id}}" value="{{ $value }}">
                                    &#8377;{{ $value }}
                                </span>
                                @endforeach
                            @else 
                                N/A
                            @endif
                        
                    </li>
                    @endforeach
                {{-- @endif --}}
            </ul>
        </div>
    </div>

</section>

<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->


<script>


$(document).ready(function(){

    $('.service_plan').click(function(){
        //alert('clicked');
        var service_plan = $(this).data('service_plan');
        //alert('service_plan : '+service_plan);
        $('#book_now').attr('data-service_plan_id', service_plan);
        //alert('done');
    });

    $('.book_now_btn').click(function(){
        //alert('book now is clicked');
        service_id = '{{ $service->id }}';
        // var service_plan_id = $(this).data('service_plan_id');
        
        var service_plan_id = $(this).attr('data-service_plan_id');
        //alert('service_plan_id :'+service_plan_id);
        var type_id = '{{$service->type_id}}';
        var category_id = '{{$service->category_id}}';
        var sub_category_id = '{{$service->sub_category_id}}';
        var price_by_city_id = $('#price_by_city_id-'+service_plan_id).val();
        var amount = $('#amount-'+amount).val();

        var auth = '{{ (Auth::check()) ? 'true' : 'false' }}';
        //alert('auth : '+auth);
        
        if(auth == 'false'){
            //alert('auth false');
            $('#myModal').modal('show');
            //$("#myModal").modal();
            
            //document.getElementById("myModal").showModal(); 
        }
        // else{
        //     alert('auth true');
        // }


        $.ajax({
            type:'POST',
            url:'{{route("bookNow")}}',
            data:{"_token":"{{csrf_token()}}",service_id:service_id,service_plan_id:service_plan_id,type_id:type_id,category_id:category_id,sub_category_id:sub_category_id,price_by_city_id:price_by_city_id,amount:amount},
            success:function(data){
              console.log(data);
              if(data.status==0){
                alert(data.message);
                error(data.message);  
              }else if(data.status==1){
                alert(data.message);
                // $('#book_now').attr('data-service_plan_id', '');
                //$('#book_now').data('service_plan_id').empty();
                
                var $myElement = $("#book_now");
                $myElement.attr("data-service_plan_id", "");
                
                success(data.message);
              }
            },
            // error: function (textStatus, errorThrown) {
                
            // }
        });
        
    });
});
</script>


@endsection