@extends('admin.layout.layout')

@section('title')

    تعديل العقار
    {{$property->type}}

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
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/Adminpanel')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item "><a href="{{ url('/Adminpanel/property')}}">التحكم في العقارات</a></li>
                        <li class="breadcrumb-item active"><a href="{{ url('/Adminpanel/property/'.$property->id.'edit')}}">تعديل العقار {{$property->type}} </a></li>
                    </ol>
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
                        <div align="right">
                            <a href="{{ route('Property.index') }}" class="btn btn-default">الخلف</a>
                        </div>
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
                        {!! Form::model($property ,['route' => ['Property.update',$property->id ], 'method'=>'PATCH' ]  )  !!}

                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>نوع العقار</label>
                                <br>
{{--                                {!! Form::select('type', $type->pluck('name'), $city->pluck('id'), ['optional' => 'Select a city...','class'=>'form-control']) !!}--}}
                                <select name="type" style="display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    box-shadow: inset 0 0 0 transparent;
    transition: border-color .15s">
                                    @foreach($type as $types)
                                        <option value="{{ $types->id }}"> {{ $types->name }}</option>
                                    @endforeach
                                </select>
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
                                {!! Form::select('city', $city->pluck('name'), $city->pluck('id'), ['optional' => 'Select a city...','class'=>'form-control']) !!}
                                <select name="type" style="display: block;
   width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    box-shadow: inset 0 0 0 transparent;
    transition: border-color .15s">
                                    @foreach($city as $cities)
                                        <option value="{{ $cities->id }}"> {{ $cities->name }}</option>
                                    @endforeach
                                </select>
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="adminId" value="{{Auth::user()->id}}" >
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn-warning">
                                    {{ __(' تعديل ') }}
                                </button>
                            </div>
                        </div>

{{--                        @include('admin.property.form')--}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>






@endsection


@section('footer')


@endsection
