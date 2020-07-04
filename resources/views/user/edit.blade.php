<!DOCTYPE html>
<html>
<head>
   <title> تعديل العضو  {{$user->firstName}}</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   @toastr_css

</head>

<body style=" direction: rtl;" >
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
    <section class="content-header">
      <div class="container-fluid">
        {{-- <div class="row mb-2"> --}}
          <div class="text-center">
            <h1>تعديل العضو {{$user->firstName}} </h1>
          </div>
      {{-- </div> --}}
    </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-12">
           <div class="card">
            <div class="card-header">
              <h3 class="card-title"> تعديل البيانات الشخصية </h3>
              </div>
              <div class="card-body">

                     {!! Form::model($user ,['route' => ['personalPage.update',$user->id], 'method'=>'PUT' ]  )  !!}

                     @include('user.form')
                     {!! Form::close() !!}
            </div>
            </div>
           </div>
          </div>
</section>
        

</div>
</body>




