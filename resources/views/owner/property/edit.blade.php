@extends('owner.layout')
@section('title')
    تعديل العقار
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
                    {{-- <div class="card-header">
                        <h3 class="card-title">تعديل العقار </h3>
                    </div> --}}

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
                            {!! Form::number('price',null , ['class'=>'form-control'] )!!}
                            @error('price')
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
{{--                            <img src ="{{asset('storage/images/'.$property->image)}}" height="100" width="100"/>--}}
                            <div id="panorama"></div>

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

                            @error('area')
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
                            <button type="submit" class="btn btn-warning">
                                {{ __(' تعديل ') }}
                            </button>
                            <a href="{{ route('Property.index') }}" class="btn btn-default">الخلف</a>

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
    <script type="text/javascript">
        var valueSelect = "Level 1";
        // var setImage = "https://pannellum.org/images/alma.jpg";
        var setImage = "{{$property->image}}";


        $('#select-level').on('change', function() {
            valueSelect = this.value;

            // change your image base on value dropdown

            setImage = "{{$property->image}}";

            // and so on

            // remove the pannellum
            $('#panorama').html('');
            // call the function
            showPannellum(setImage, valueSelect);
        });

        // call the image for first time
        showPannellum(setImage, valueSelect);

        // function show pannellum
        function showPannellum(image, value){
            pannellum.viewer('panorama', {
                "type": "equirectangular",
                "panorama": image,
                "autoLoad": true,
                "autoRotate": -2,
                "title": value
            });
        }
    </script>
@endsection
