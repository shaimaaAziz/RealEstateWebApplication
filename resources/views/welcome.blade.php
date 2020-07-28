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
  كل العقارات
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

    <div id="myslide" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators hidden-xs">
            <li data-target="#myslide" data-slide-to="0" class="active"></li>
            <li data-target="#myslide" data-slide-to="1"></li>
            <li data-target="#myslide" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
            <div class="item item1 active">
                <div class="carousel-caption hidden-xs">
                    <h2>
                        دعنا نأخذك إلى منزل أحلامك</h2>
                </div>
            </div>

            <div class="item item2">
                <div class="carousel-caption hidden-xs">
                    <h2>
                        ستجد هنا كل شيء من بيوت حديثة </h2>

                </div>
            </div>

            <div class="item item3">
                <div class="carousel-caption hidden-xs">
                    <h2>
                        البيوت الحديثة تجعل الحياة أفضل </h2>
                </div>
            </div>
        </div>

        <a class="left carousel-control" href="#myslide" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myslide" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    {{--end slider--}}

    <br><br>

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

                                    <div class="producttitle">
                                        @if($properties->type == 0 )  فيلا
                                        @elseif($properties->type == 1 ) أرض 
                                        @elseif($properties->type == 2 ) شقة
                                        @elseif($properties->type == 3 ) بيت
                                        @elseif($properties->type == 4 ) شاليه
                                        @endif
                                    </div>

                                    <p class="text-justify"><i class="fa fa-location-arrow" aria-hidden="true"></i> {{Str::limit($properties->description, 80)}}</p>

                                    <div style="margin: 10px 0;">
                                        <div style="display: inline-block;width: 49%;"><i class="fa fa-bed" aria-hidden="true"></i> {{ $properties->roomNumbers }} غرف</div>
                                        <div style="display: inline-block;width: 49%;"><i class="fa fa-object-group" aria-hidden="true"></i> {{ $properties->area }} متر</div>
                                    </div>

                                    <div class="pricetext"><i class="fa fa-usd" aria-hidden="true"></i> {{$properties->maxPrice}}</div>
                                    <div class="productprice">
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
                                    
                                    <div><br>
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
                                                            <button class="btn btn-success">إرسال المراجعة</button>
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
                                لا يوجد اي عقارات حاليا
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
                    <h2 class="head" style="margin-right: 10px">البحث المتقدم </h2>
                    <div class="profile-usermenu" style="padding: 10px">
                        {!! Form::open(['url' => 'search' , 'action' =>'post']) !!}
                        <ul class="nav" style="margin-right: 0px; padding-right: 0px;">
                            <li>
                                <label>سعر  العقار</label>
                                {!! Form::number("price", null, ['class' =>'form-control' , 'placeholder'=>"سعر  العقار (رقم)"]) !!}
                            </li>

                            <li>
                                <label>عدد الغرف</label>
                                {!! Form::number("roomNumbers" , null, ['class' =>'form-control' , 'placeholder'=>"عدد الغرف (رقم)"]) !!}
                            </li>
                            <li>
                                <label>نوع العقار</label>
                                {!! Form::select("type"  ,['0'=>"فيلا" , '1'=>"شاليه",'2'=>"ارض" , '3'=>"شقة",'4'=>"بيت"], null, ['class' =>'form-control']) !!}
                            </li>
                            <li>
                                <label>نوع العملية</label>
                                {!! Form::select("state" , ['0'=>"ايجار" , '1'=>"بيع"],null, ['class' =>'form-control']) !!}
                            </li>
                            <li>
                                <label>مساحة العقار</label>
                                {!! Form::text("area", null, ['class' =>'form-control' , 'placeholder'=>"مساحة العقار"]) !!}
                            </li>
                            <li>
                                <label></label>
                                {!! Form::submit("ابحث", ['class' =>'banner_btn']) !!}
                            </li>
                        </ul>
                        {!! Form::close() !!}
                    </div>
                </div>
                <br>

                <div class="profile-sidebar fixed">
                    <h2 class="head" style="margin-right: 10px">خيارات العقارات </h2>
                    <div class="profile-usermenu">
                        <ul class="nav" style="margin-right: 0px; padding-right: 0px;">
                            <li class="active">
                                <a href="{{url('/ShowAllBullding')}}">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                  كل العقارات </a>
                            </li>
                            <li>
                                <a href="{{url('/ForRent')}}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    ايجار </a>
                            </li>
                            <li>
                                <a href="{{url('/ForBuy')}}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                  تمليك </a>
                             </li>
                             <li>
                                 <a href="{{url('/type/0')}}">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                   الشقق </a>
                            </li>
                            <li>
                                <a href="{{url('/type/1')}}">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    الفلل</a>
                            </li>
                            <li>
                                <a href="{{url('/type/2')}}">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                  الشاليهات </a>
                             </li>
                             <li>
                                 <a href="{{url('/type/3')}}">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    الأراضي</a>
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
                                                                <h3 class="m_1"><a href="#">الاعلانات </a></h3>
                                                                <p class="m_2">عليك نشر اعلان لعقار حقيقي.<br>عليك ازالة عقارك بعد بيعه او تأجيره.</p>
                                                                <a href="services.html" class="feature_btn">المزيد</a> </div>
                                                            <div class="col-mg-3 col-xs-3 feature_grid1"> <i class="fa fa-key fa-3x" aria-hidden="true"></i>
                                                                <h3 class="m_1"><a href="#">مميزات الموقع</a></h3>
                                                                <p class="m_2">تتبع القيمة المقدرة لمنزلك و البقاء على اتصال مع السوق المحلي.</p>
                                                                <a href="services.html" class="feature_btn">المزيد</a> </div>
                                                            <div class="col-lg-3 col-xs-3 feature_grid1"> <i class="fa fa-check-circle fa-3x"></i>
                                                                <h3 class="m_1"><a href="#">شروط الاستخدام</a></h3>
                                                                <p class="m_2">عنوان دقيق للشارع، الحي، المدينة، البلد. <br>وصف العقار المعلن عنه. </p>
                                                                <a href="services.html" class="feature_btn">المزيد</a> </div>
                                                            <div class="col-lg-3 col-xs-3 feature_grid2"> <i class="fa fa-users fa-3x" aria-hidden="true"></i>
                                                                <h3 class="m_1"><a href="#">من نحن</a></h3>
                                                                <p class="m_2">انسعى لنيل رضاكم، ونتمنى لكم الوصول الى عقاركم المستقبلي المناسب.</p>
                                                                <a href="services.html" class="feature_btn">المزيد</a> </div>
                                                        </div>
                                                    </div>
                                                </div> <br><br>




                                                <div class="contact ">
                                                    <div class="col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1">
                                                        <div class="row">
                                                            <h1>تواصل معنا</h1>
                                                            <form class="contact-form" method="post" action="{{route('contact.send')}}">
                            @csrf

                            <div class="col-lg-6 col-sm-6">
                               <br> <textarea name="message" type="text" class="form-control" id="message" rows="7" required="required" placeholder="الرسالة"></textarea>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                <label>الاسم</label>
                                    <input  name="name" type="text" class="form-control" id="name" required="required" placeholder="الاسم">
                                </div>
                                <div class="form-group">
                                <label>البريد الإلكتروني</label>
                                    <input name="email" type="email" class="form-control" id="email" required="required" placeholder="البريد الإلكتروني">
                                </div>
                                <div class="form-group">
                                <label>رقم الهاتف</label>
                                    <input name="phone" type="text" class="form-control" id="phone" required="required" placeholder="رقم الهاتف ">
                                </div>
                                <div class="form-group">


                                <label>نوع الرسالة</label>
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
                                    {!! Form::submit("إرسال", ['class' =>'btn banner_btn']) !!}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                                            </div><br><br><br>

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
