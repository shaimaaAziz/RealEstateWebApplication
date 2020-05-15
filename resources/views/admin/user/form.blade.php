
            @csrf

            <div class="form-group row">
                {{--  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

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
                {{--  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

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
                {{--  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

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
                {{--  <label for="admin" class="col-md-4 col-form-label text-md-right">{{ __('admin') }}</label>--}}

                <div class="col-md-12">
                    <label> الصلاحية</label>

                    {!! Form::select('admin',['0'=>'user' , '1'=>'admin'] ,null , ['class'=>'form-control'] )!!}

                    @error('admin')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>



            <div class="form-group row">
                {{--   <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

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
                {{--   <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

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
                {{--   <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

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
                {{--   <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                <div class="col-md-12">
                    <label>المدينة</label>
                  
                    {!! Form::text('city',null , ['class'=>'form-control'] )!!}

                    @error('city')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>



@if(!isset($user))

            <div class="form-group row">
                {{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

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
                        {{ __(' تسجيل ') }}
                    </button>
                </div>
            </div>
       