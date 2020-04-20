@extends('admin.layout.layout')

@section('title')
اضافة عضو 

@endsection

@section('header')


@endsection

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>اضافة عضو </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/Adminpanel')}}">الرئيسية</a></li>
              <li class="breadcrumb-item "><a href="{{ url('/Adminpanel/users')}}">التحكم في الأعضاء</a></li>
              <li class="breadcrumb-item active"><a href="{{ url('/Adminpanel/users/create')}}">اضافة عضو </a></li>
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
              <h3 class="card-title">اضافة عضو</h3>
              </div>
              <div class="card-body">
              <form method="POST" action="{{ url('/Adminpanel/users') }}"  enctype="multipart/form-data" style="float: right; margin-left: 10px">
              @include('admin.user.form')
              </form>
            </div>
            </div>
           </div>
          </div>
</section>
        





@endsection


@section('footer')


@endsection