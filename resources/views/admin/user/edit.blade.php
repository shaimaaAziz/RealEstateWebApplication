@extends('admin.layout.layout')

@section('title')

تعديل العضو 
{{$user->firstName}}

@endsection

@section('header')


@endsection

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>تعديل العضو  </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin/Adminpanel')}}">الرئيسية</a></li>
              <li class="breadcrumb-item "><a href="{{ url('/admin/Adminpanel/users')}}">التحكم في الأعضاء</a></li>
              <li class="breadcrumb-item active"><a href="{{ url('/admin/Adminpanel/users/'.$user->id.'edit')}}">تعديل العضو {{$user->firstName}} </a></li>
            </ol>         
        </div>
      </div><!-- /.container-fluid -->
    </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-12">
           <div class="card">
            <div class="card-header">
              <h3 class="card-title"> تعديل العضو {{$user->firstName}}</h3>
              </div>
              <div class="card-body">

                     {!! Form::model($user ,['route' => ['users.update',$user], 'method'=>'PUT' ]  )  !!}

                     @include('admin.user.form')
                     {!! Form::close() !!}
            </div>
            </div>
           </div>
          </div>
</section>
        





@endsection


@section('footer')


@endsection