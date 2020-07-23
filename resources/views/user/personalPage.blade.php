@extends('user.layout')

@section('title')
الصفحة الشخصية للمستخدم
@endsection
<style>
    h1{
        color:#5b9bd1 ;
    }
    #personal{
        color:#64a0d5 ;
    }
    span{
        font-size: 20px;
        line-height: 2em;
    }


</style>
@section('content')
      <br />
      <h1 align="center">البيانات الشخصية</h1>
      <br />

      <div align="right" class="jumbotron " style="margin:auto;  width:70%">

          <div class="row"  >

              <div class="block-content " >

                  <div class="product-info " style="float:right; display:inline-block">
                      <ul class="list-inline" >

                          <li><span id="personal">الاسم : </span><span class="text">{{Auth::user()->firstName.' '.Auth::user()->middleName .' '.Auth::user()->lastName}}</span></li><br><br>
                          <li><span id="personal"> الإيميل : </span><span class="text">{{$user->email}}</span></li><br><br>
                          <li><span id="personal"> رقم الجوال : </span><span class="text">{{$user->mobile}}</span></li><br><br>
                          {{-- <li><span id="personal"> كلمة السر : </span><span class="text">{{$user->password}}</span></li><br><br> --}}
                          <li><span id="personal">العنوان : </span><span class="text">{{$user->street}}</span></li><br><br>
                          <li><span id="personal"> المدينة : </span><span class="text">

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
                      <div style="float:left; ">
                        <img src =" {{asset('images/' . $user->image)}}" height="200" width="250" style="border-radius: 50%;"/>

                      </div>
                 
              </div>
          </div>
              {{-- <a href="{{ route('personalPage.index') }}" class="btn btn-default">رجوع</a> --}}
              <a style=" font-size: 18px; margin-right: 30px;" href="{{ route('personalPage.edit',$user->id) }}" class="btn btn-primary">تعديل</a>

      </div>

@endsection


