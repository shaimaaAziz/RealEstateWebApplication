@extends('layouts.app')
{{--@section('title')--}}
{{--    اهلا بك زائرنا الكريم--}}
{{--@endsection--}}

{{--@section('header')--}}
{{--    <style media="screen">--}}
{{--        body {--}}
{{--            background-color: red;--}}
{{--        }--}}
{{--    </style>--}}
{{--@endsection--}}
{{--@section('content')--}}

{{-- @extends('layouts.app') --}}
@section('title')
    كل العقارات
@endsection

@section('header')
    {!! Html::style('cus/buall.css') !!}
@endsection

@push('css')
     <style>
        .favorite_properties{
            color: blue;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row profile">
            <div class="col-md-9">
                <div class="profile-content">
@if( count($property) > 0)
    @foreach($property as $key => $properties)
        @if($key % 3 == 0 && $key!= 0 )
            <div class="clearfix"></div>
        @endif
        <div class="col-md-4 pull-right">
            <div class="productbox">
                <img src="http://lorempixel.com/468/258" class="img-responsive">
                <div class="producttitle">{{ $properties->type }}</div>
                <p class="text-justify">{{Str::limit($properties->description, 80)}}</p>
                <div class="productprice"><div class="pull-left"> <a href="#" class="btn btn-primary btn-sm" role="button">اظهر التفاصيل
                            <span class="glyphicon glyphicon-shopping-cart"> </span></a></div>
                    <div class="pricetext">{{$properties->maxPrice}}</div></div>

                      <div> 

        
                        <ul class="post-footer">
                            <li>
                                @guest
                                    <a href="javascript:void(0);" 
                                    onclick="toastr.info('يجب عليك تسجيل الدخول قبل القيام باضافة العقار الي المفضلة .',
                                    '',{
                                        closeButton: true,
                                        progressBar: true,
                                    }
                                    )"><i class="fas fa-heart" style="color:#485f5a;"></i></a>
                                       {{ $properties->favorite_to_users->count() }}
                                @else
                                    <a href="javascript:void(0);" 
                                    onclick="document.getElementById('favorite-form-{{ $properties->id }}')
                                    .submit();"  class="{{ !Auth::user()->favorite_properties->
                                    where('pivot.property_id',$properties->id)->count()  == 0 ?'favorite_properties' : ''}}">
                                    <i class="fas fa-heart" style="color:#485f5a;"></i>
                                    {{ $properties->favorite_to_users->count() }}
                                   </a> 
        
                                    <form id="favorite-form-{{ $properties->id }}" method="POST" 
                                    action="{{ route('property.favorite', $properties->id) }}
                                        " style="display: none;">
                                        @csrf
                                    </form>
                                @endguest
        
                            </li>   
                        </ul>
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

    <div class="text-center">

    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <h2 style="margin-right: 10px"> البحث المتقدم </h2>
                    <div class="profile-usermenu" style="padding: 10px">
                        {!! Form::open(['url' => 'search' , 'action' =>'post']) !!}
                        <ul class="nav" style="margin-right: 0px; padding-right: 0px;">
                            <li>
                                {!! Form::number("minPrice", null, ['class' =>'form-control' , 'placeholder'=>'السعر الادنى العقار']) !!}
                            </li>
                            <li>
                                {!! Form::number("maxPrice"  , null, ['class' =>'form-control' , 'placeholder'=>'السعر الاعلى العقار']) !!}
                            </li>
                            <li>
                                {!! Form::number("roomNumbers" , null, ['class' =>'form-control' , 'placeholder'=>'عدد الغرف']) !!}
                            </li>
                            <li>
                                {!! Form::select("type"  ,['0'=>'فيلا' , '1'=>'شاليه','2'=>'ارض' , '3'=>'شقة','4'=>'يت'], null, ['class' =>'form-control' , 'placeholder'=>'نوع العقار']) !!}
                            </li>
                            <li>
                                {!! Form::select("state" , ['0'=>'ايجار' , '1'=>'بيع'],null, ['class' =>'form-control' , 'placeholder'=>'نوع العملية']) !!}
                            </li>
                            <li>
                                {!! Form::text("square", null, ['class' =>'form-control' , 'placeholder'=>'مساحة العقار']) !!}
                            </li>
                            <li>
                                {!! Form::submit("ابحث", ['class' =>'banner_btn']) !!}
                            </li>
                        </ul>
                        {!! Form::close() !!}
                    </div>
                </div>
                <br>

                <div class="profile-sidebar">
                    <h2 style="margin-right: 10px"> خيارات العقارات </h2>
                    <div class="profile-usermenu">
                        <ul class="nav" style="margin-right: 0px; padding-right: 0px;">
                            <li class="active">
                                <a href="{{url('/admin/ShowAllBullding')}}">
                                    <i class="glyphicon glyphicon-home"></i>
                                    كل العقارات </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/ForRent')}}">
                                    <i class="glyphicon glyphicon-user"></i>
                                    ايجار </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/ForBuy')}}">
                                    <i class="glyphicon glyphicon-user"></i>
                                    تمليك </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/type/0')}}">
                                    <i class="glyphicon glyphicon-flag"></i>
                                    الشقق </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/type/1')}}">
                                    <i class="glyphicon glyphicon-flag"></i>
                                    الفلل </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/type/2')}}">
                                    <i class="glyphicon glyphicon-flag"></i>
                                    الشاليهات </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/type/3')}}">
                                    <i class="glyphicon glyphicon-flag"></i>
                                    الأراضي </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>

            </div>


        </div>
    </div>



@endsection

{{--@section('content')--}}


{{--    <div class="banner text-center">--}}
{{--        <div class="container">--}}
{{--            <div class="banner-info">--}}
{{--                <h1>Lorem ipsum dolor sit amet</h1>--}}
{{--                <p>Lorem ipsum dolor sit amet, facilisis egestas sodales non luctus,<br>--}}
{{--                    sem quas potenti malesuada vel phasellus.</p>--}}
{{--                <a class="banner_btn" href="about.html">Read More</a> </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="main">--}}
{{--        <div class="content_white">--}}
{{--            <h2>Featured Services</h2>--}}
{{--            <p>Quisque cursus metus vitae pharetra auctor, sem massa mattis semat interdum magna.</p>--}}
{{--        </div>--}}
{{--        <div class="featured_content" id="feature">--}}
{{--            <div class="container">--}}
{{--                <div class="row text-center">--}}
{{--                    <div class="col-mg-3 col-xs-3 feature_grid1"> <i class="fa fa-cog fa-3x"></i>--}}
{{--                        <h3 class="m_1"><a href="services.html">Legimus graecis</a></h3>--}}
{{--                        <p class="m_2">Lorem ipsum dolor sit amet, facilisis egestas sodales non luctus, sem quas potenti malesuada vel phasellus.</p>--}}
{{--                        <a href="services.html" class="feature_btn">More</a> </div>--}}
{{--                    <div class="col-mg-3 col-xs-3 feature_grid1"> <i class="fa fa-comments-o fa-3x"></i>--}}
{{--                        <h3 class="m_1"><a href="services.html">Mazim minimum</a></h3>--}}
{{--                        <p class="m_2">Lorem ipsum dolor sit amet, facilisis egestas sodales non luctus, sem quas potenti malesuada vel phasellus.</p>--}}
{{--                        <a href="services.html" class="feature_btn">More</a> </div>--}}
{{--                    <div class="col-md-3 col-xs-3 feature_grid1"> <i class="fa fa-globe fa-3x"></i>--}}
{{--                        <h3 class="m_1"><a href="services.html">Modus altera</a></h3>--}}
{{--                        <p class="m_2">Lorem ipsum dolor sit amet, facilisis egestas sodales non luctus, sem quas potenti malesuada vel phasellus.</p>--}}
{{--                        <a href="services.html" class="feature_btn">More</a> </div>--}}
{{--                    <div class="col-md-3 col-xs-3 feature_grid2"> <i class="fa fa-history fa-3x"></i>--}}
{{--                        <h3 class="m_1"><a href="services.html">Melius eligendi</a></h3>--}}
{{--                        <p class="m_2">Lorem ipsum dolor sit amet, facilisis egestas sodales non luctus, sem quas potenti malesuada vel phasellus.</p>--}}
{{--                        <a href="services.html" class="feature_btn">More</a> </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="about-info">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-8">--}}
{{--                        <div class="block-heading-two">--}}
{{--                            <h2><span>About Our Company</span></h2>--}}
{{--                        </div>--}}
{{--                        <p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero.</p>--}}
{{--                        <br>--}}
{{--                        <p>Sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>--}}
{{--                        <a class="banner_btn" href="about.html">Read More</a> </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="block-heading-two">--}}
{{--                            <h3><span>Our Advantages</span></h3>--}}
{{--                        </div>--}}
{{--                        <div class="panel-group" id="accordion-alt3">--}}
{{--                            <div class="panel">--}}
{{--                                <div class="panel-heading">--}}
{{--                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseOne-alt3"> <i class="fa fa-angle-right"></i> Quisque cursus metus vitae pharetra auctor</a> </h4>--}}
{{--                                </div>--}}
{{--                                <div id="collapseOne-alt3" class="panel-collapse collapse">--}}
{{--                                    <div class="panel-body">--}}
{{--                                        <p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="panel">--}}
{{--                                <div class="panel-heading">--}}
{{--                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseTwo-alt3"> <i class="fa fa-angle-right"></i> Duis autem vel eum iriure dolor in hendrerit</a> </h4>--}}
{{--                                </div>--}}
{{--                                <div id="collapseTwo-alt3" class="panel-collapse collapse">--}}
{{--                                    <div class="panel-body">--}}
{{--                                        <p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="panel">--}}
{{--                                <div class="panel-heading">--}}
{{--                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseThree-alt3"> <i class="fa fa-angle-right"></i> Quisque cursus metus vitae pharetra auctor </a> </h4>--}}
{{--                                </div>--}}
{{--                                <div id="collapseThree-alt3" class="panel-collapse collapse">--}}
{{--                                    <div class="panel-body">--}}
{{--                                        <p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="panel">--}}
{{--                                <div class="panel-heading">--}}
{{--                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseFour-alt3"> <i class="fa fa-angle-right"></i> Duis autem vel eum iriure dolor in hendrerit</a> </a> </h4>--}}
{{--                                </div>--}}
{{--                                <div id="collapseFour-alt3" class="panel-collapse collapse">--}}
{{--                                    <div class="panel-body">--}}
{{--                                        <p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="highlight-info">--}}
{{--            <div class="overlay spacer">--}}
{{--                <div class="container">--}}
{{--                    <div class="row text-center">--}}
{{--                        <div class="col-sm-3 col-xs-6"> <i class="fa fa-smile-o fa-5x"></i>--}}
{{--                            <h4>120+ Happy Clients</h4>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-3 col-xs-6"> <i class="fa fa-check-square-o fa-5x"></i>--}}
{{--                            <h4>600+ Projects Completed</h4>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-3 col-xs-6"> <i class="fa fa-trophy fa-5x"></i>--}}
{{--                            <h4>25 Awards Won</h4>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-3 col-xs-6"> <i class="fa fa-map-marker fa-5x"></i>--}}
{{--                            <h4>3 Offices</h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="testimonial-area">--}}
{{--            <div class="testimonial-solid">--}}
{{--                <div class="container">--}}
{{--                    <h2>Client Testimonials</h2>--}}
{{--                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">--}}
{{--                        <ol class="carousel-indicators">--}}
{{--                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"> <a href="#"></a> </li>--}}
{{--                            <li data-target="#carousel-example-generic" data-slide-to="1" class=""> <a href="#"></a> </li>--}}
{{--                            <li data-target="#carousel-example-generic" data-slide-to="2" class=""> <a href="#"></a> </li>--}}
{{--                            <li data-target="#carousel-example-generic" data-slide-to="3" class=""> <a href="#"></a> </li>--}}
{{--                        </ol>--}}
{{--                        <div class="carousel-inner">--}}
{{--                            <div class="item active">--}}
{{--                                <p>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation."</p>--}}
{{--                                <p><strong>- John Doe -</strong></p>--}}
{{--                            </div>--}}
{{--                            <div class="item">--}}
{{--                                <p>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation."</p>--}}
{{--                                <p><strong>- Jane Doe -</strong></p>--}}
{{--                            </div>--}}
{{--                            <div class="item">--}}
{{--                                <p>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation."</p>--}}
{{--                                <p><strong>- John Smith -</strong></p>--}}
{{--                            </div>--}}
{{--                            <div class="item">--}}
{{--                                <p>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation."</p>--}}
{{--                                <p><strong>- Linda Smith -</strong></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--@endsection--}}

@section('footer')
    <script type="text/javascript">

        // alert('هلو')
    </script>

@endsection
