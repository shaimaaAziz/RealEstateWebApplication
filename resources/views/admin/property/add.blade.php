@extends('admin.layout.layout')

@section('title')
    اضافة عقار

@endsection

@section('header')


@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>إضافة عقار </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin/AdminDashboard')}}">الرئيسية</a></li>
            <li class="breadcrumb-item "><a href="{{ url('/admin/Adminpanel/Properties')}}">التحكم في العقارات</a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/admin/Adminpanel/Properties/create')}}">إضافة عقار </a></li>
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
                        <h3 class="card-title">اضافة عقار</h3>
                    </div>
                    <div class="card-body">
                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('Properties.index') }}"  enctype="multipart/form-data" style=" margin-left: 10px">
                            @include('admin.property.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>






@endsection

@section('footer')


@endsection
