@extends('layouts.app')
<!-- @section('title')
    اهلا بك زائرنا الكريم
@endsection -->

<!-- {{--@section('header')--}}
{{--    <style media="screen">--}}
{{--        body {--}}
{{--            background-color: red;--}}
{{--        }--}}
{{--    </style>--}}
{{--@endsection--}}
{{--@section('content')--}} -->

<!-- {{-- @extends('layouts.app') --}} -->
@section('title')
    {{__('message.كل العقارات')}}
@endsection

@section('header')
    {!! Html::style('cus/buall.css') !!}
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

    <div class="banner text-center">
        <div class="container">
            <div class="banner-info">
                {{--                <h1>أهلا وسهلا بك زائرنا الكريم</h1>--}}
                <p> </p>
            </div>
        </div>
    </div><br><br>

    <div class="container">
        <div class="row profile">
            <div class="col-lg-9">
                <div class="profile-content">
                    @if( count($property) > 0)
                        @foreach($property as $key => $properties)
                            @if($key % 3 == 0 && $key!= 0 )
                                <div class="clearfix"></div>
                            @endif
                            <div class="col-lg-4 pull-right">
                                <div class="productbox">
                                    <img src="http://lorempixel.com/468/258" class="img-responsive">

                                    <div class="producttitle">{{ $properties->type }}</div>

                                    <p class="text-justify"><i class="fa fa-location-arrow" aria-hidden="true"></i> {{Str::limit($properties->description, 80)}}</p>

                                    <div style="margin: 10px 0;">
                                        <div style="display: inline-block;width: 49%;"><i class="fa fa-bed" aria-hidden="true"></i> {{ $properties->roomNumbers }} غرف</div>
                                        <div style="display: inline-block;width: 49%;"><i class="fa fa-object-group" aria-hidden="true"></i> {{ $properties->area }} متر</div>
                                    </div>

                                    <div class="pricetext"><i class="fa fa-usd" aria-hidden="true"></i> {{$properties->maxPrice}}</div>
                                    <div class="productprice"><div class=""> 
                                        <form method="get" action="{{ route('showMap') }}"  enctype="multipart/form-data" style="float: right; margin-left: 10px">
                                            {{ csrf_field() }}
                            
                                            <input type="hidden" name="property_id" value="{{$properties->id}}" >
                                            {{-- <input type="hidden" name="id" value="{{$properties->id}}" > --}}

                                        <button class="btn btn-primary" style="width:100%" role="button">{{__('message.اظهر التفاصيل')}}
                                                <span class="fa fa-shopping-cart" aria-hidden="true"> </span></button>
                                        </form>  </div><br>
                                    </div>
                                    <div>


                                                <ul class="post-footer" style="list-style: none; padding:0px">
                                                    <li>
                                                        @guest
                                                            <a style="text-decoration: none;" href="javascript:void(0);"
                                                            onclick="toastr.info('يجب عليك تسجيل الدخول قبل القيام باضافة العقار الي المفضلة .',
                                                            '',{
                                                                closeButton: true,
                                                                progressBar: true,
                                                            }
                                                            )"><i class="fas fa-heart" id="no-background-hover"></i></a>
                                                            {{ $properties->favorite_to_users->count() }}
                                                            
                                                                
                                                                <a class="glyphicon glyphicon-shopping-cart" style="float:left; text-decoration: none;" href="javascript:void(0);"
                                                                onclick="toastr.info('يجب عليك تسجيل الدخول قبل القيام بحجز العقار   .',
                                                                '',{
                                                                    closeButton: true,
                                                                    progressBar: true,
                                                                }
                                                                )">
                                                                @if ($properties->state ==0)  تأجير
                                                                @elseif($properties->state ==1) بيع
                                                                @endif
                                                                </a>
                                                                
                                                            

                                                            <li  style="direction:ltr;">
                                                                <input id="input-1-xs " name="rate" class="rating rating-loading " data-min="0"
                                                                data-max="5" data-step="0.1"
                                                                data-show-clear="false" data-show-caption="false"
                                                                value="{{ $properties->averageRating() }}"
                                                                data-size="xs" disabled>


                                                            </li>
                                                            <div class="clearfix"></div>
                                                        @else
                                                        @can('user')
                                                        <form action="{{ route('properties.reservation') }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="id" required="" value="{{ $properties->id }}">
                                                            <button class="  glyphicon glyphicon-shopping-cart" style="float:left; text-decoration: none;">
                                                            @if ($properties->state ==0)  تأجير
                                                            @elseif($properties->state ==1) بيع
                                                            @endif
                                                           </button>
                                                        </form>
                                                        @endcan
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

                                                           
                                                        @endguest

                                                    </li>
                                                   
                                                </ul>

                                                {{-- <div class="details col-md-6"> --}}

                                                    @can('user')
                                                    <form action="{{ route('properties.post') }}" method="POST">

                                                        {{ csrf_field() }}
                                                        <div class="rating">

                                                            <input id="input-1" name="rate" class="rating rating-loading" data-min="0"
                                                            data-max="5" data-step="1" value="{{ $properties->userAverageRating }}"
                                                            data-size="xs">

                                                            <input type="hidden" name="id" required="" value="{{ $properties->id }}">

                                                    {{-- <span class="review-no">422 reviews</span> --}}
                                                            <br/>
                                                            <button class="btn btn-success">{{__('message.إرسال المراجعة')}}</button>
                                                        </div>
                                                    </form>
                                                    @endcan
                                                {{-- </div> --}}

                                            </div>

                                    </div>
                                </div>
                            @endforeach


                            <div class="clearfix"></div>
                            <br>

                        @else
                            <div class= 'alert alert-danger'>
                                {{__('message.لا يوجد اي عقارات حاليا')}}
                            </div>
                        @endif

                        <div class="sliderbtn">
                            <a href="#" class="previous round">&#8249;</a>
                            <a href="#" class="next round">&#8250;</a>
                        </div>
                        <br>

                </div>
            </div>

            <div class="col-lg-3 fixed">
                <div class="profile-sidebar">
                    <h2 style="margin-right: 10px">{{__('message.البحث المتقدم')}} </h2>
                    <div class="profile-usermenu" style="padding: 10px">
                        {!! Form::open(['url' => 'search' , 'action' =>'post']) !!}
                        <ul class="nav" style="margin-right: 0px; padding-right: 0px;">
                            <li>
                                <label>{{__('message.السعر الادنى العقار')}}</label>
                                {!! Form::number("minPrice", null, ['class' =>'form-control' , 'placeholder'=>"{{__('message.السعر الادنى العقار (رقم)')}}"]) !!}
                            </li>
                            <li>
                                <label>{{__('message.السعر الاعلى العقار')}}</label>
                                {!! Form::number("maxPrice"  , null, ['class' =>'form-control' , 'placeholder'=>"{{__('message.السعر الاعلى العقار (رقم)')}}"]) !!}
                            </li>
                            <li>
                                <label>{{__('message.عدد الغرف')}}</label>
                                {!! Form::number("roomNumbers" , null, ['class' =>'form-control' , 'placeholder'=>"{{__('message.عدد الغرف (رقم)')}}"]) !!}
                            </li>
                            <li>
                                <label>{{__('message.نوع العقار')}}</label>
                                {!! Form::select("type"  ,['0'=>"{{__('message.فيلا')}}" , '1'=>"{{__('message.شاليه')}}",'2'=>"{{__('message.ارض')}}" , '3'=>"{{__('message.شقة')}}",'4'=>"{{__('message.بيت')}}"], null, ['class' =>'form-control']) !!}
                            </li>
                            <li>
                                <label>{{__('message.نوع العملية')}}</label>
                                {!! Form::select("state" , ['0'=>"{{__('message.ايجار')}}" , '1'=>"{{__('message.بيع')}}"],null, ['class' =>'form-control']) !!}
                            </li>
                            <li>
                                <label>{{__('message.مساحة العقار')}}</label>
                                {!! Form::text("area", null, ['class' =>'form-control' , 'placeholder'=>"{{__('message.مساحة العقار')}}"]) !!}
                            </li>
                            <li>
                                <label></label>
                                {!! Form::submit("{{__('message.ابحث')}}", ['class' =>'banner_btn']) !!}
                            </li>
                        </ul>
                        {!! Form::close() !!}
                    </div>
                </div>
                <br>

                <div class="profile-sidebar fixed">
                    <h2 style="margin-right: 10px">{{__('message.خيارات العقارات')}} </h2>
                    <div class="profile-usermenu">
                        <ul class="nav" style="margin-right: 0px; padding-right: 0px;">
                            <li class="active">
                                <a href="{{url('/ShowAllBullding')}}">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    {{__('message.كل العقارات')}} </a>
                            </li>
                            <li>
                                <a href="{{url('/ForRent')}}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    {{__('message.ايجار')}} </a>
                            </li>
                            <li>
                                <a href="{{url('/ForBuy')}}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    {{__('message.تمليك')}} </a>
                             </li>
                             <li>
                                 <a href="{{url('/type/0')}}">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    {{__('message.الشقق')}} </a>
                            </li>
                            <li>
                                <a href="{{url('/type/1')}}">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    {{__('message.الفلل')}} </a>
                            </li>
                            <li>
                                <a href="{{url('/type/2')}}">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    {{__('message.الشاليهات')}} </a>
                             </li>
                             <li>
                                 <a href="{{url('/type/3')}}">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    {{__('message.الأراضي')}} </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- END MENU -->
                                                    </div>

                                                </div>


                                                </div>
                                            </div> <br><br>

                                            <div class="main ">
                                                <div class="featured_content" id="feature">
                                                    <div class="container">
                                                        <div class="row text-center">
                                                            <div class="col-mg-3 col-xs-3 feature_grid1"> <i class="fa fa-television fa-3x" aria-hidden="true"></i>
                                                                <h3 class="m_1"><a href="#">{{__('message.الاعلانات')}} </a></h3>
                                                                <p class="m_2">{{__('message.عليك نشر اعلان لعقار حقيقي.')}}<br>{{__('message.عليك ازالة عقارك بعد بيعه او تأجيره.')}}</p>
                                                                <a href="services.html" class="feature_btn">{{__('message.المزيد')}}</a> </div>
                                                            <div class="col-mg-3 col-xs-3 feature_grid1"> <i class="fa fa-key fa-3x" aria-hidden="true"></i>
                                                                <h3 class="m_1"><a href="#">{{__('message.مميزات الموقع')}}</a></h3>
                                                                <p class="m_2">{{__('message.تتبع القيمة المقدرة لمنزلك و البقاء على اتصال مع السوق المحلي.')}}</p>
                                                                <a href="services.html" class="feature_btn">{{__('message.المزيد')}}</a> </div>
                                                            <div class="col-lg-3 col-xs-3 feature_grid1"> <i class="fa fa-check-circle fa-3x"></i>
                                                                <h3 class="m_1"><a href="#">{{__('message.شروط الاستخدام')}}</a></h3>
                                                                <p class="m_2">{{__('message.عنوان دقيق للشارع، الحي، المدينة، البلد.')}} <br>{{__('message.وصف العقار المعلن عنه.')}} </p>
                                                                <a href="services.html" class="feature_btn">{{__('message.المزيد')}}</a> </div>
                                                            <div class="col-lg-3 col-xs-3 feature_grid2"> <i class="fa fa-users fa-3x" aria-hidden="true"></i>
                                                                <h3 class="m_1"><a href="#">{{__('message.من نحن')}}</a></h3>
                                                                <p class="m_2">{{__('message.انسعى لنيل رضاكم، ونتمنى لكم الوصول الى عقاركم المستقبلي المناسب.')}}</p>
                                                                <a href="services.html" class="feature_btn">{{__('message.المزيد')}}</a> </div>
                                                        </div>
                                                    </div>
                                                </div> <br><br>




                                                <div class="contact ">
                                                    <div class="col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1">
                                                        <div class="row">
                                                            <h1>{{__('message.تواصل معنا')}}</h1>
                                                            <form class="contact-form" method="post" action="{{route('contact.send')}}">
                            @csrf

                            <div class="col-lg-6 col-sm-6">
                                <textarea name="message" type="text" class="form-control" id="message" rows="7" required="required" placeholder="{{__('message.الرسالة')}}"></textarea>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                <label>{{__('message.الاسم')}}</label>
                                    <input  name="name" type="text" class="form-control" id="name" required="required" placeholder="{{__('message.الاسم')}}">
                                </div>
                                <div class="form-group">
                                <label>{{__('message.البريد الإلكتروني')}}</label>
                                    <input name="email" type="email" class="form-control" id="email" required="required" placeholder="{{__('message.البريد الإلكتروني')}}">
                                </div>
                                <div class="form-group">
                                <label>{{__('message.رقم الهاتف')}}</label>
                                    <input name="phone" type="text" class="form-control" id="phone" required="required" placeholder="{{__('message.رقم الهاتف')}} ">
                                </div>
                                <div class="form-group">
                                 
                                   
                                <label>{{__('message.نوع الرسالة')}}</label>
                                <?php use App\messageType;
                                $messageType = messageType::all(); ?>
                                <select name="messageType" class="form-control">
                                    @foreach($messageType as $types)
                                    <option value="{{ $types->id }}"> {{$types->name}}</option>
                                    @endforeach
                                </select>
                              
                                </div>
                            </div>

                            <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3">
                                <div class="text-center">
                                  <!-- <button type="submit" id="submit" name="submit" class="btn btn-send">Send </button> -->
                                    {!! Form::submit("{{__('message.إرسال')}}", ['class' =>'btn banner_btn']) !!}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           
@endsection

@section('footer')
<script type="text/javascript">

    $("#input-id").rating();

</script>


<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8EKP73TK6UVkBWNOeRcyQDOvDzvAUla4&callback=initMap">
        </script>
@endsection
