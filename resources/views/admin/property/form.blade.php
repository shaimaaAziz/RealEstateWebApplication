{{--@if(Session::has('flash_message'))--}}
{{--    <div class="alert alert-success">--}}
{{--        {{ Session::get('flash_message') }}--}}
{{--    </div>--}}
{{--@endif--}}
@csrf
<label>صاحب العقار</label><br>
<div class="form-group row">
    <div class="col-md-6">
     
       <label>الاسم الأول</label>
        <select name="firstName" class="form-control">
           @foreach ($users as $user)
             <option value="{{ $user->id }}">{{ $user->firstName }}</option>
           @endforeach
            </select>
            
        @error('firstName')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
{{-- </div> --}}
{{-- <div class="form-group row "> --}}
    <div class="col-md-6 ">
        <label> اسم العائلة</label>

        <select name="lastName" class="form-control">
           @foreach ($users as $user)
             <option value="{{ $user->id }}">{{ $user->lastName }}</option>
           @endforeach
            </select>
            
        @error('lastName')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-md-12">
        <label>نوع العقار</label>
        <br>
        {{--        {!! Form::text('type',null , ['class'=>'form-control'] )!!}--}}
        {{--        {!! Form::select('type',['0'=>'فيلا' , '1'=>'ارض','3'=>'شقة' , '4'=>'بيت', '5'=>'شاليه'] ,null , ['class'=>'form-control'],['optional' => 'Select a city...'] )!!}--}}
        {{--        {!! Form::select('type', $type->pluck('name'), $city->pluck('id'), ['optional' => 'Select a city...','class'=>'form-control']) !!}--}}
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
        {!! Form::select('city',['0'=>'غزة' , '1'=>'رفح', '2'=>'خانيونس', '3'=>'وسطى'] ,null , ['class'=>'form-control'],['optional' => 'Select a city...'] )!!}

        @error('city')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>

{{-- <input type="hidden" name="adminId" value="{{Auth::user()->id}}" > --}}
<div class="form-group row mb-0">
    <div class="col-md-12">
        <button type="submit" class="btn btn-warning">
            {{ __(' إضافة ') }}
        </button>
    </div>
</div>
