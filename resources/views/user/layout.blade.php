<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

   @yield('header')
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @toastr_css
  <title> @yield('title')</title>

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
              <li class="active"><a class="glyphicon glyphicon-user" href="{{ url('/user/personalPage') }}" > المعلومات الشخصية </a></li>
          </ul>
          <ul class="nav navbar-nav ">
            <li class="active"><a class="glyphicon glyphicon-heart" href="{{ url('/user/personalPage/favorite') }}"> المفضلة</a></li>
        </ul>
        <ul class="nav navbar-nav ">
          <li class="active"><a class="glyphicon glyphicon-star" href="{{ url('/user/personalPage/properties') }}"> التقيمات </a></li>
      </ul>
      <ul class="nav navbar-nav ">
        <li class="active"><a  href="{{ url('/user/AllMyReservations') }}"> الحجوزات </a></li>
    </ul>
      <ul class="nav navbar-nav navbar-right">
          <li class="active"><a class="glyphicon glyphicon-home" href="/"> الرئيسية</a></li>
      </ul>
  </nav>
  </div>

    <section class="content">
        <div class="container">
      @yield('content')
        </div>
    </section>
  </body>
</html>
