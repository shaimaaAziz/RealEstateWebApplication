<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
{{--    {!! HTML::style('website/css/bootstrap.min.css') !!}--}}
{{--    {!! HTML::style('website/css/flexslider.css') !!}--}}
{{--    {!! HTML::style('website/css/style.css') !!}--}}
{{--    {!! HTML::style('website/css/font-awesome.min.css') !!}--}}
{{--    {!! HTML::script('website/js/jquery.min.js') !!}--}}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link href="{{ Request::root() }}/website/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ Request::root() }}/website/css/flexslider.css" rel="stylesheet" />
    <link href="{{ Request::root() }}/website/css/style.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ Request::root() }}/website/css/font-awesome.min.css"> --}}
    <script src="{{ Request::root() }}/website/js/jquery.min.js"></script>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>

    {{-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    <!-- CSRF Token --> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @toastr_css
    <title>موقع عقارات
{{-- {{ config('app.name', 'موقع عقارات') }} --}}
  
    @yield('title')</title>
    @stack('css')
    @yield('header')

</head>
<body style="direction:rtl;">
<div class="header">
    <div class="container"> <a class="navbar-brand" href="{{url('/')}}"><i class="fa fa-paper-plane"></i> ONE</a>
        <div class="menu pull-left"> <a class="toggleMenu" href="#"><img src="{{ Request::root() }}/website/images/nav_icon.png" alt="" /> </a>
            <ul class="nav" id="nav">
                <li class="current"><a href="{{url('/')}}">الرئيسية</a></li>
                <li><a href="about.html">من نحن</a></li>
                <li><a href="services.html">خدماتنا</a></li>
                <li><a href="contact.html">اتصل بنا</a></li>
                @guest
                    <li class="nav-item">
                        <a class="glyphicon glyphicon-log-in nav-link" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="glyphicon glyphicon-user nav-link" href="{{ route('register') }}">{{ __('عضويه جديده') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->firstName }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a style="text-decoration: none;" class=" dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('تسجيل خروج') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                          
                            @can('manage-users')
                            <a style="text-decoration: none; " class=" dropdown-item" href="/AdminDashboard">الصفحة الشخصية</a>
                            @endcan
                            @can('user')
                            <a style="text-decoration: none; " class="dropdown-item" href="/user/personalPage">الصفحة الشخصية</a>
                            @endcan
                            @can('owner')
                            <a style="text-decoration: none; " class="dropdown-item" href="/owner/Ownerpanel/users">الصفحة الشخصية</a>
                            @endcan
                        </div>  
                        
                    </li>
                @endguest
                <div class="clear"></div>
            </ul>
        </div>
    </div>
</div>




        <main class="py-4">
            @yield('content')
        </main>
<div class="footer">
    <div class="footer_bottom">
        <div class="follow-us"> <a class="fa fa-facebook social-icon" href="#"></a> <a class="fa fa-twitter social-icon" href="#"></a> <a class="fa fa-linkedin social-icon" href="#"></a> <a class="fa fa-google-plus social-icon" href="#"></a> </div>
        <div class="copy">
            <p>Copyright &copy; 2020 Company Name. Design by <a href="http://www.templategarden.com" 
                rel="nofollow">TemplateGarden</a></p>
        </div>
    </div>
</div>
{{--        {!! HTML::script('website/js/bootstrap.min.js') !!}--}}
{{--        {!! HTML::script('website/js/jquery.flexslider.js') !!}--}}

           <script type="text/javascript" src="{{ Request::root() }}/website/js/responsive-nav.js"></script>
        <script src="{{ Request::root() }}/website/js/bootstrap.min.js"></script>
        <script src="{{ Request::root() }}/website/js/jquery.flexslider.js"></script>
        <main class="py-4">
            @yield('footer')
        </main>
    </div>
</body>
@jquery
@toastr_js
@toastr_render
</html>
