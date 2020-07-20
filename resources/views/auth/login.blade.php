@extends('layouts.app')
@section('title')
    صفحة تسجيل الدخول
@endsection
@section('content')
<div class="container">

    <div class="contact_bottom">
        <hr>
        <h2>  صفحة تسجيل الدخول</h2>
        <hr>
        <br>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="text2 " style="float: right; margin-left: 10px">
{{--                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('عنوان الإيميل') }}</label>--}}

                <div class="col-md-12">
{{--                    {{ __('عنوان الإيميل') }}--}}
                    <input id="email" type="email" placeholder="عنوان الإيميل" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
<br><br><br>
            <div class="text2 "style="float: right; margin-left: 10px">
{{--                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('كلمه المرور') }}</label>--}}

                <div class="col-md-12">
{{--         --}}{{----}}{{--           {{ __('كلمه المرور') }}--}}
                    <input id="password" type="password" placeholder="كلمه المرور" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="text2 ">
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('تذكرني') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="text2  mb-0">
                <div class="col-md-12">
                    <button type="submit" class="banner_btn ">
                        {{ __('تسجيل الدخول') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="banner_btn" href="{{ route('password.request') }}">
                            {{ __('هل نسيت كلمه المرور؟') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>


<div class="clearfix"></div>
<br>
    </div>

@endsection
