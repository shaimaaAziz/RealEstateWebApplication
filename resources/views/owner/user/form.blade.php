
            @csrf

            <div class="form-group row">

                <div class="col-md-12">
               <label>الاسم الاول</label>
                    {!! Form::text('firstName',null , ['class'=>'form-control'] )!!}

                    @error('firstName')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">

                <div class="col-md-12">
                    <label>اسم الأب </label>

                    {!! Form::text('middleName',null , ['class'=>'form-control'] )!!}

                    @error('middleName')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">

                <div class="col-md-12">
                    <label>اسم العائلة</label>

                    {!! Form::text('lastName',null , ['class'=>'form-control'] )!!}

                    @error('lastName')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
         



            <div class="form-group row">

                <div class="col-md-12">
                    <label>البريد الالكتروني </label>

                    {!! Form::text('email',null , ['class'=>'form-control'] )!!}

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">

                <div class="col-md-12">
                    <label>رقم الجوال</label>

                    {!! Form::text('mobile',null , ['class'=>'form-control'] )!!}

                    @error('mobile')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">

                <div class="col-md-12">
                    <label>العنوان </label>

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



@if(!isset($user))

            <div class="form-group row">

                <div class="col-md-12">
                    <label>كلمة المرور</label>

                    <input id="password" type="password" placeholder="كلمه السر" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

         









@endif

            <div class="form-group row mb-0">
                <div class="col-md-12">
                    <button type="submit" class="btn-warning">
                        {{ __(' تعديل ') }}
                    </button>
                </div>
            </div>
