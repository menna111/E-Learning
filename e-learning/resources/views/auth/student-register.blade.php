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
        <form action="">
            <div class="container w-lg-50">
                <div class="row text-right mt-4">
                    <!-- Name -->
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-light float-right" for="name">الااسم</label>
                            <input class="form-control input-circle" id="name" type="text">
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-light float-right" for="email">البريد الالكتروني</label>
                            <input class="form-control input-circle" id="email" type="email">
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label class="text-light float-right" for="password">كلمة المرور</label>
                            <input class="form-control input-circle" id="password" type="password">
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label class="text-light float-right" for="password">اعادة كلمة المرور</label>
                            <input class="form-control input-circle" id="password" type="password">
                        </div>
                    </div>

                    <!-- رقم الهاتف -->
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-light float-right" for="name">ارقم الهاتف</label>
                            <input class="form-control input-circle" id="phone_number" type="text">
                        </div>
                    </div>

                    <!-- الفرقة -->
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-light float-right" for="name">الفرقة</label>
                            <select class="form-control input-circle" id="level_id">
                                <option>اختر الفرقة</option>
                                <option value="1">الفرقة الاولى</option>
                                <option value="2">الفرقة الثانية</option>
                                <option value="3">الفرقة الثالثة</option>
                                <option value="4">الفرقة الرابعة</option>

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
