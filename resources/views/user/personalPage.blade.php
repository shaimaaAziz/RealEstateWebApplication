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
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> {{ Auth::user()->firstName }} <span class="caret"></span></a>
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

  
    <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="/">الرئيسية</a></li>
    </ul>
</nav>
</div>
<div class="container">
   <a href=""
        class="btn btn-primary">المعلومات الشخصية</a>

        <br> <br> <a href=""
        class="btn btn-primary "> المفضلة </a>
</div>
</body>
</html>


