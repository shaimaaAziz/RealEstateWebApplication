@extends('user.layout')

@section('title')
الصفحة الشخصية للمستخدم  
@endsection

@section('content')
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

@endsection


