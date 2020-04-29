@extends('admin.layout.layout')

@section('title')
    اضافة عقار

@endsection

@section('header')


@endsection

@section('content')

{{--    <section class="content-header">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row mb-2">--}}
{{--                <div class="col-sm-6">--}}
{{--                    <h1>اضافة عقار </h1>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6">--}}
{{--                    <ol class="breadcrumb float-sm-right">--}}
{{--                        <li class="breadcrumb-item"><a href="{{ url('/Adminpanel')}}">الرئيسية</a></li>--}}
{{--                        <li class="breadcrumb-item "><a href="{{ url('/Adminpanel/Property)}}">التحكم في العقارات</a></li>--}}
{{--                        <li class="breadcrumb-item active"><a href="{{ url('/Adminpanel/Property/create')}}">اضافة عقار </a></li>--}}
{{--                    </ol>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">اضافة عقار</h3>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form method="POST" action="{{ url('/Adminpanel/Property') }}"  enctype="multipart/form-data" style="float: right; margin-left: 10px">
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
