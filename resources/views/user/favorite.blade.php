<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @toastr_css
    <title>المفضلة</title>

</head>

    <body style=" direction:rtl;">
        <div class="header">
            <nav class="navbar navbar-inverse">
                 
                    <ul class="nav navbar-nav"> 
                        <li class=" active dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> {{ Auth::user()->firstName }} <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                    {{ __('تسجيل خروج') }}</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                          </ul>
                        </li>
                      </ul>
                      <ul class="nav navbar-nav ">
                        <li class="active"><a href="{{ url('/user/personalPage') }}" >المعلومات الشخصية</a></li>
                    </ul>
                    <ul class="nav navbar-nav ">
                      <li class="active"><a href="{{ url('/user/personalPage/favorite') }}"> المفضلة </a></li>
                  </ul>
              
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="/">الرئيسية</a></li>
                </ul>
            </nav>
            </div>

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

                        
                                        <ul class="post-footer" style="list-style: none;">
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
                                                @else
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
</body>
</html>