
            @csrf

            <div class="form-group row">
                {{--  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

     <div class="col-md-12">
         <label>الاسم الاول</label>
         {!! Form::text('firstName',null , ['class'=>'form-control'] )!!}
     </div>   
 </div>
 <div class="form-group row">
    <div class="col-md-12">
        @error('firstName')
        <div class="alert alert-danger">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <i class="material-icons">close</i>
           </button>
           <strong>{{ $message }}</strong>
       </div>
       @enderror
    </div>
 </div>

 <div class="form-group row">
                {{--  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

     <div class="col-md-12">
         <label>اسم الأب </label>
         {!! Form::text('middleName',null , ['class'=>'form-control'] )!!}
     </div>
 </div>
 <div class="form-group row">
    <div class="col-md-12">
        @error('middleName')
        <div class="alert alert-danger">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <i class="material-icons">close</i>
           </button>
           <strong>{{ $message }}</strong>
       </div>
       @enderror
    </div>
 </div>

 <div class="form-group row">
                {{--  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

     <div class="col-md-12">
         <label>اسم العائلة</label>
         {!! Form::text('lastName',null , ['class'=>'form-control'] )!!}
     </div>
 </div>
 <div class="form-group row">
    <div class="col-md-12">
        @error('lastName')
        <div class="alert alert-danger">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <i class="material-icons">close</i>
           </button>
           <strong>{{ $message }}</strong>
       </div>
       @enderror
    </div>
 </div>

            <div class="form-group row">
                {{--   <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                <div class="col-md-12">
                    <label>البريد الالكتروني </label>

                    {!! Form::text('email',null , ['class'=>'form-control'] )!!}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    @error('email')
                    <div class="alert alert-danger">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <i class="material-icons">close</i>
                       </button>
                       <strong>{{ $message }}</strong>
                   </div>
                   @enderror
                </div>
             </div>

            <div class="form-group row">
                {{--   <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                <div class="col-md-12">
                    <label>رقم الجوال</label>

                    {!! Form::number('mobile',null , ['class'=>'form-control'] )!!}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    @error('mobile')
                    <div class="alert alert-danger">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <i class="material-icons">close</i>
                       </button>
                       <strong>{{ $message }}</strong>
                   </div>
                   @enderror
                </div>
             </div>

            <div class="form-group row">
                {{--   <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                <div class="col-md-12">
                    <label>العنوان </label>
                    {!! Form::text('street',null , ['class'=>'form-control'] )!!}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    @error('street')
                    <div class="alert alert-danger">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <i class="material-icons">close</i>
                       </button>
                       <strong>{{ $message }}</strong>
                   </div>
                   @enderror
                </div>
             </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <label>المدينة</label>
                    {!! Form::select('city',['0'=>'غزة' , '1'=>'رفح', '2'=>'خانيونس', '3'=>'وسطى'] ,null , ['class'=>'form-control'],['optional' => 'Select a city...'] )!!}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    @error('city')
                    <div class="alert alert-danger">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <i class="material-icons">close</i>
                       </button>
                       <strong>{{ $message }}</strong>
                   </div>
                   @enderror
                </div>
             </div>

            <div class="form-group row">
                {{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                <div class="col-md-12">
                    <label>كلمة المرور</label>
                    <input id="password" type="password" placeholder="كلمه السر" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    @error('password')
                    <div class="alert alert-danger">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <i class="material-icons">close</i>
                       </button>
                       <strong>{{ $message }}</strong>
                   </div>
                   @enderror
                </div>
             </div>
             
            <div class="form-group row d-flex flex-column pr-2">
                {{-- <div class="col-md-12"> --}}
                    {!! Form::label('image',' الصورة الشخصية' )!!}
                    {!! Form::file('image' )!!}
                {{-- </div> --}}
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-12">
                    <button type="submit" class="btn-warning" style="padding: 4px; padding-right: 10px; padding-left: 10px; ">
                        {{ __(' حفظ ') }}
                    </button>
      
                    <a href="{{route('personalPage.index')}}" style=" " class="btn btn-danger ">رجوع  </a>
                </div>
            </div>
