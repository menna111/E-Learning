


@extends('layouts.app')
@section('title','تسجيل الدخول')
@section('content')

<!-- ==================================================
                   Start Login Section
 ================================================== -->
<section class="login-sec mt-5" dir="rtl">
    <!-- Header -->
    <h1 class="text-yellow text-center">
        حسابي
    </h1>
    <h1 class="text-light text-center">
        تسجيل الدخول
    </h1>
    <!-- Form -->
    <form action="">
        <div class="container w-lg-50">
            <div class="row text-right mt-4">
                <!-- Name Or Email -->
                <div class="col-12">
                    <div class="form-group">
                        <label class="text-light float-right" for="name">اسم المستخدم</label>
                        <input class="form-control input-circle" id="name" type="text">
                    </div>
                </div>
                <!-- Password -->
                <div class="col-12">
                    <div class="form-group">
                        <label class="text-light float-right" for="password">كلمة المرور</label>
                        <input class="form-control input-circle" id="password" type="password">
                    </div>
                </div>
                <!-- Submit -->
                <div class="col-lg-4 col-12 reverse-offset-lg-4 mt-3">
                    <button class="btn btn-submit">تسجيل</button>
                </div>
                <!-- Have account -->
                <div class="col-12 mt-3">
                    <span class="text-light">ليس لديك حساب <a href="register0.html" class="text-yellow">قم بالتسجيل الان</a></span>
                </div>
            </div>
        </div>
    </form>
</section>
<!-- ==================================================
                  End Login Section
================================================== -->


@endsection

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Login') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
