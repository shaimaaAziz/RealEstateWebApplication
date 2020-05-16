@extends('owner.layout.layout')

@section('title')

    تعديل العقار

@endsection

@section('header')


@endsection

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>تعديل العقار  </h1>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">تعديل العقار </h3>
                    </div>
                    <div class="card-body">

                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)

                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                    <span><b> Danger - </b> {{ $error }}</span>
                                </div>
                            @endforeach
                    </div>
                    @endif


                    {!! Form::model($property ,['route' => ['Property.update',$property->id ], 'method'=>'PATCH' ]  )  !!}

                    @csrf

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>نوع العقار</label>
                            <br>
                            {!! Form::select('type',['0'=>'فيلا' , '1'=>'ارض', '2'=>'شقة', '3'=>'بيت', '4'=>'شاليه'] ,null , ['class'=>'form-control'],['optional' => 'Select a city...'] )!!}

                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label> أدنى سعر </label>
                            {!! Form::number('minPrice',null , ['class'=>'form-control'] )!!}
                            @error('minPrice')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>اعلى سعر </label>

                            {!! Form::number('maxPrice',null , ['class'=>'form-control'] )!!}

                            @error('maxPrice')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>عدد الغرف</label>

                            {!! Form::number('roomNumbers',null , ['class'=>'form-control'] )!!}

                            @error('roomNumbers')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>حالة العقار </label>

                            {!! Form::select('state',['0'=>'ايجار' , '1'=>'بيع'] ,null , ['class'=>'form-control'],['optional' => 'Select a city...'] )!!}

                            @error('state')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>وصف العقار</label>

                            {!! Form::textarea('description',null , ['class'=>'form-control'] )!!}

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>صورة العقار </label>

                            {{Form::label('image', null,['class' => 'control-label'])}}
                            {{Form::file('image')}}
                            <br>
                            <img src ="{{asset('storage/images/'.$property->image)}}" height="100" width="100"/>
                            <br>

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>مدة العقار</label>

                            {!! Form::number('propertyPeriod',null , ['class'=>'form-control'] )!!}

                            @error('propertyPeriod')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>مساحة العقار</label>

                            {!! Form::number('area',null , ['class'=>'form-control'] )!!}

                            @error('propertyPeriod')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>العنوان</label>
                            {!! Form::text('street',null , ['class'=>'form-control'] )!!}
                            @error('street')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>المدينة</label>
                            <br>
                            {!! Form::select('city',['0'=>'غزة' , '1'=>'رفح', '2'=>'خانيونس', '3'=>'وسطى'] ,null , ['class'=>'form-control'],['optional' => 'Select a city...'] )!!}

                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <a href="{{ route('Property.index') }}" class="btn btn-default">الخلف</a>
                            <button type="submit" class="btn btn-warning">
                                {{ __(' تعديل ') }}
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@section('footer')
@endsection
