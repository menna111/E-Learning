@extends('layouts.app')
@section('title','تسجيل بيانات المحاضرين')
@section('content')


    <!-- ==================================================
                        Start Register Section
      ================================================== -->
    <section class="register-sec mt-5" dir="rtl">
        <!-- Header -->
        <h1 class="text-yellow text-center">
            تسجيل مستخدم جديد
        </h1>
        <p class="text-light text-center">
            برجاء اختيار الحساب المناسب !
        </p>
        <!-- Buttons -->
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-6 reverse-offset-lg-4">
                    <a href="{{route('student.register')}}" class="btn btn-submit active">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        طالب
                    </a>
                </div>
                <div class="col-lg-2 col-6">
                    <a href="{{route('register')}}" class="btn btn-submit ">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        محاضر
                    </a>
                </div>
            </div>
        </div>

        <!-- Form -->
        <form action="{{route('register')}}" method="post">
            @csrf
            <div class="container w-lg-50">
                <!-- /resources/views/post/create.blade.php -->
                <div style="margin-top: 20px">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <!-- Create Post Form -->
                <div class="row text-right mt-4">
                    <!-- Name -->
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-light float-right" for="name">الاسم</label>
                            <input class="form-control input-circle" id="name" type="text" name="name">
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-light float-right" for="email">البريد الالكتروني</label>
                            <input class="form-control input-circle" id="email" type="email" name="email">
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label class="text-light float-right" for="password">كلمة المرور</label>
                            <input class="form-control input-circle" id="password" type="password" name="password">
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label class="text-light float-right" for="password">اعادة كلمة المرور</label>
                            <input class="form-control input-circle" id="password" type="password" name="password_confirmation">
                        </div>
                    </div>

                    <!-- رقم الهاتف -->
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-light float-right" for="phone_number">ارقم الهاتف</label>
                            <input class="form-control input-circle" id="phone_number" type="text" name="phone_number">
                        </div>
                    </div>

                    <!-- الفرقة -->
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-light float-right" for="level_id">الفرقة</label>
                            <select class="form-control input-circle" id="level_id"  name="level_id"    >
                                <option>اختر الفرقة</option>
                                 @foreach($levels as $level)
                                <option value="{{$level->id}}" >{{$level->name}} </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="col-lg-4 col-12 reverse-offset-lg-4 mt-3">
                        <button class="btn btn-submit">تسجيل</button>
                    </div>
                    <!-- Are you hAve account?? -->
                    <div class="col-12 mt-3">
                        <span class="text-light">لديك حساب بالفعل <a href="login.html" class="text-yellow">قم بتسجيل الدخول</a></span>
                    </div>
                </div>

            </div>
        </form>

    </section>
    <!-- ==================================================
                      End Register Section
    ================================================== -->
@endsection
