<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
  {{-- <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script> --}}
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.pannellum.org/2.4/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.pannellum.org/2.2/pannellum.js"></script>

{{--    <script src="js/three.min.js"></script>--}}
{{--    <script src="js/panolens.min.js"></script>--}}
    <style type="text/css">
        #panorama {
            width: 900px;
            height: 600px;
            margin: 50px auto;
        }
    </style>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @toastr_css
  <title>@yield('title')</title>
  @yield('header')

  <style>
    .material-icons { font-size: 13px; }
    
</style>
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
              <li style="margin-top:6px;"> <img src="{{ asset('images/' . Auth::user()->image) }}" height="36" width="40" class="img-circle elevation-2" alt="User Image" style="border-radius: 50%;"> </li>
            </ul>
            
            <ul class="nav navbar-nav ">
              <li class="active"><a class="glyphicon glyphicon-user" href="{{ url('/owner/Ownerpanel/users') }}" >المعلومات الشخصية</a></li>
          </ul>
          <ul class="nav navbar-nav ">
            <li class="active dropdown"><a class="dropdown-toggle icon ion ion-home" data-toggle="dropdown" href="#"> العقارات <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li ><a href="{{ route('Property.index') }}">  عقاراتي </a></li>
                <li ><a href="{{ route('Property.create') }}"> إضافة عقار </a></li>
              </ul>
        </ul>
        <ul class="nav navbar-nav ">
          <li class="active ">  
            <a href="{{ url('/owner/Ownerpanel/reservations') }}"class = "icon ion ion-clipboard ">  الحجوزات </a></li>
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


    <main class="py-4">
      @yield('footer')
  </main>
  </body>
</html>
