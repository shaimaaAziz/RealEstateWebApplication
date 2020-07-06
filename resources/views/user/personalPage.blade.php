<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>الصفحة الشخصية للمستخدم </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body  style="direction:rtl;">
<div class="header">
<nav class="navbar navbar-inverse">
     
        <ul class="nav navbar-nav"> 
            <li class="active dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> {{ Auth::user()->firstName }} <span class="caret"></span></a>
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

      <ul class="nav navbar-nav ">
        <li class="active"><a href="{{ url('/user/personalPage/properties') }}"> التقيمات </a></li>
    </ul>


    <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="/">الرئيسية</a></li>
    </ul>
</nav>
</div>

<section class="content">
  <div class="container">

      <br />
      <h1 align="center">البيانات الشخصية</h1>
      <br />

      <div align="right" class="  jumbotron ">

          <div class="row"  >
              
              <div class="block-content" >

                  <div class="product-info">
                      <ul class="list-inline" >
                        
                          <li class="author"><span>الاسم:</span><span class="text">{{Auth::user()->firstName.' '.Auth::user()->middleName .' '.Auth::user()->lastName}}</span></li><br><br>
                          <li class="author"><span> الإيميل:</span><span class="text">{{$user->email}}</span></li><br><br>
                          <li class="author"><span> رقم الجوال:</span><span class="text">{{$user->mobile}}</span></li><br><br>
                          <li class="author"><span> كلمة السر:</span><span class="text">{{$user->password}}</span></li><br><br>
                          <li class="author"><span>العنوان:</span><span class="text">{{$user->street}}</span></li><br><br>
                          <li class="author"><span> المدينة:</span><span class="text">

                                          @if($user->city==0)
                                      {{'غزة'}}
                                  @elseif($user->city==1)
                                      {{'رفح'}}
                                  @elseif($user->city==2)
                                      {{'خانيونس'}}
                                  @elseif($user->city==3)
                                      {{'وسطى'}}
                                  @endif

                                      </span></li>

                      </ul>
                  </div>
              </div>
          </div>
              {{-- <a href="{{ route('personalPage.index') }}" class="btn btn-default">رجوع</a> --}}
              <a style="margin-right: 30px;" href="{{ route('personalPage.edit',$user->id) }}" class="btn btn-primary">تعديل</a>
         
      </div>      
    </div>


</section>
</body>
</html>


