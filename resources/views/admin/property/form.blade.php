@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
@csrf

<div class="form-group row">
    <div class="col-md-12">
        <label>نوع العقار</label>
        <br>
{{--        {!! Form::text('type',null , ['class'=>'form-control'] )!!}--}}
{{--        {!! Form::select('type',['0'=>'فيلا' , '1'=>'ارض','3'=>'شقة' , '4'=>'بيت', '5'=>'شاليه'] ,null , ['class'=>'form-control'],['optional' => 'Select a city...'] )!!}--}}
        {!! Form::select('type', $type->pluck('name'), $city->pluck('id'), ['optional' => 'Select a city...','class'=>'form-control']) !!}

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

{{--        {!! Form::text('state',null , ['class'=>'form-control'] )!!}--}}
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

{{--        {!! Form::text('image',null , ['class'=>'form-control'] )!!}--}}
{{--        {{Form::open(['route' => 'property.store', 'files' => true])}}--}}

          {{Form::label('image', null,['class' => 'control-label'])}}
            {{Form::file('image')}}

        {{--        {{Form::submit('Save', ['class' => 'btn btn-success'])}}--}}

{{--        {{Form::close()}}--}}
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
            {{ __(' إضافة ') }}
        </button>
    </div>
</div>
