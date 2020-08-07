{{--@if(Session::has('flash_message'))--}}
{{--    <div class="alert alert-success">--}}
{{--        {{ Session::get('flash_message') }}--}}
{{--    </div>--}}
{{--@endif--}}
@csrf

<div class="form-group row">
    <div class="col-md-12">
        <label>نوع العقار</label>
        <br>
        {{--        {!! Form::text('type',null , ['class'=>'form-control'] )!!}--}}
        {{--        {!! Form::select('type',['0'=>'فيلا' , '1'=>'ارض','3'=>'شقة' , '4'=>'بيت', '5'=>'شاليه'] ,null , ['class'=>'form-control'],['optional' => 'Select a city...'] )!!}--}}
        {{--        {!! Form::select('type', $type->pluck('name'), $city->pluck('id'), ['optional' => 'Select a city...','class'=>'form-control']) !!}--}}
        {!! Form::select('type',['0'=>'فيلا' , '1'=>'ارض', '2'=>'شقة', '3'=>'بيت', '4'=>'شاليه'] ,null , ['class'=>'form-control','id' =>'type'],['optional' => 'Select a city...'] )!!}

        @error('type')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-md-12">
        <label>  سعر </label>
        {!! Form::number('price',null , ['placeholder '=>'أدخل السعر بالدولار','class'=>'form-control','min'=>'0'] )!!}
        @error('price')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>

<div class="form-group row" id="roomNo">
    <div class="col-md-12">
        <label>عدد الغرف</label>

        {!! Form::number('roomNumbers',null , ['class'=>'form-control' ,'min'=>'0'] )!!}

        @error('roomNumbers')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>
<div class="form-group row" >
    <div class="col-md-12">
        <label>حالة العقار </label>

        {!! Form::select('state',['0'=>'ايجار' , '1'=>'بيع'] ,null , ['class'=>'form-control','id'=>'state'],['optional' => 'Select a city...'] )!!}

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
        {!! Form::label('image',' الصورة الشخصية',['class' => 'control-label'] )!!}
        {{Form::file('image')}}

{{--        @error('image')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--        @enderror--}}
    </div>
</div>
<div class="form-group row" id="rent">
    <div class="col-md-12">
        <label>مدة العقار</label>

        {!! Form::number('propertyPeriod',null , ['placeholder '=>'أدخل المدة بالشهر','class'=>'form-control','min'=>'0'] )!!}

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

        {!! Form::number('area',null , ['class'=>'form-control','min'=>'0'] )!!}

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
        {!! Form::select('city',['0'=>'غزة' , '1'=>'رفح', '2'=>'خانيونس', '3'=>'وسطى'] ,null , ['class'=>'form-control'],['optional' => 'Select a city...'] )!!}

        @error('city')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>


<div class="form-group row ">
    <div class="col-md-12">
        <br>
        <label>خط الطول</label>
        <input type="text" name="Longitude" id="lon" >
    
        <label>خط العرض</label>
        <input type="text" name="Latitude" id="lat">
    </div>
</div>
<br>

{{-- <input id="searchInput" class="mapControls" type="text" placeholder="Enter a location"> --}}

<div id="map"></div> <br>


<div class="form-group row mb-0">
    <div class="col-md-12">
        <button type="submit" class="btn btn-warning">
            {{ __(' إضافة ') }}
        </button>
        <a href="{{route('users.index')}}" style=" " class="btn btn-danger ">رجوع  </a>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#rent").hide();
        $("#roomNo").hide();

        $('#state').click(function ( ) {
            if( $(this).val() == 0) {
            $("#rent").show();
            }else if( $(this).val() == 1) {
            $("#rent").hide();
            }
        });
        $('#type').click(function ( ) {
            if( $(this).val() == 1 || $(this).val() == 4) {
            $("#roomNo").hide();
            }else
            $("#roomNo").show();
        });
    });
</script>
