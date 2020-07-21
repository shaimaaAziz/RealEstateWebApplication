@extends('user.layout')

@section('title')
المفضلة
@endsection
@push('css')
     <style>
        .favorite_properties{
            color:rgb(192, 3, 3);
        }
        .favorite_properties:hover{
            color:rgb(192, 3, 3);
        }
        .rating-xs {
           font-size: 1.5em;
        }

        #map {
        width: 100%;
        height:500px;
        background-color: grey;

    }

        #no-background-hover::before {
   background-color: transparent !important;
}
    </style>
@endpush
@section('content')
    <div class="  row profile">
        <div class="col-md-9">
            <div class="  profile-content">
                @if( count($property) > 0)
                    @foreach($property as $key => $properties)
                        @if($key % 3 == 0 && $key!= 0 )
                            <div class="clearfix"></div>
                        @endif
                        <div class="col-md-4 pull-right">
                            <div class="productbox">
                                <img src="http://lorempixel.com/468/258" class="img-responsive">

                                <div class="producttitle">{{ $properties->type }}</div>

                                <p class="text-justify"><i class="fa fa-location-arrow" aria-hidden="true"></i> {{Str::limit($properties->description, 80)}}</p>

                                <div style="margin: 10px 0;">
                                    <div style="display: inline-block;width: 49%;"><i class="fa fa-bed" aria-hidden="true"></i> {{ $properties->roomNumbers }} غرف</div>
                                    <div style="display: inline-block;width: 49%;"><i class="fa fa-object-group" aria-hidden="true"></i> {{ $properties->area }} متر</div>
                                </div>

                                <div class="pricetext"><i class="fa fa-usd" aria-hidden="true"></i> {{$properties->maxPrice}}</div>
                                <div class="productprice">
                                    <ul class="post-footer" style="list-style: none; padding:0px">
                                        <li>
                                            @if(!(!empty($properties->reservation->property_id )))
                                            <form action="{{ route('properties.reservation') }}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" required="" value="{{ $properties->id }}">
                                                <button class="  glyphicon glyphicon-shopping-cart" style="float:left; text-decoration: none;">
                                                @if ($properties->state ==0)  تأجير
                                                @elseif($properties->state ==1) بيع
                                                @endif
                                               </button>
                                            </form>
                                            
                                           @endif
                                                <a href="javascript:void(0);" style="text-decoration: none;"
                                                onclick="document.getElementById('favorite-form-{{ $properties->id }}')
                                                .submit();"  class="{{ !Auth::user()->favorite_properties->
                                                where('pivot.property_id',$properties->id)->count()  == 0 ?'favorite_properties' : ''}}">
                                                <i class="fas fa-heart" id="no-background-hover"></i> </a>
                                                {{ $properties->favorite_to_users->count() }}
            
            
                                                <form id="favorite-form-{{ $properties->id }}" method="POST"
                                                action="{{ route('property.favorite', $properties->id) }}
                                                    " style="display: none;">
                                                    @csrf
                                                </form>
            
                                        </li>
                                    </ul>
                                   
                                    <div class="">
                                    <form method="get" action="{{ route('showMap') }}"  enctype="multipart/form-data" style="float: right; margin-left: 10px">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="property_id" value="{{$properties->id}}" >
                                        {{-- <input type="hidden" name="id" value="{{$properties->id}}" > --}}

                                    <button class="btn btn-primary" style="width:100%" role="button">اظهر التفاصيل
                                            <span class="fa fa-shopping-cart" aria-hidden="true"> </span></button>
                                    </form> 
                                 </div><br>
                                </div>
                            </div>   
                        </div>

                      
                    @endforeach


                    <div class="clearfix"></div>
                    <br>

                @else
                    <div class= 'alert alert-danger'>
                        لا يوجد أي عقارات قد قمت بوضعها في المفضلة 
                    </div>
                @endif


            </div>
        </div>
    </div>
    <div class=" text-center"> <a href="{{ route('personalPage.index') }}" style="margin-top:30px;" class="btn btn-success ">رجوع</a></div>

</div>
@endsection
