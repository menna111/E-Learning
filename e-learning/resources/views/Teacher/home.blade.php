@extends('layouts.app')
@section('title','الصفحة الرئيسية')
@section('content')

    <!-- ==================================================
                      Start Profile Section
    ================================================== -->
    <div class="container">

        <!-- Row -->
        <div class="row justify-content-md-between text-left">
            <!-- Image And Name-->
            <div class="col-lg-4 col-8 text-light">
                <div class="row">
                    <!-- Image -->
                    <div class="col-3 align-self-center">
                        <img class="rounded-circle" src="{{$user->image}}" alt="" width="50">
                    </div>
                    <!-- Name -->
                    <div class="col-9 my-4 mr-0 text-right align-self-center">
                        <h4 class="p-0 m-0">{{$user->name}}</h4>
                        <h6 class="p-0 m-0"><a class="text-light" href="">تعديل الاسم</a> - <a class="text-light" href="">أضافة سيرة ذاتية</a></h6>
                    </div>
                </div>
            </div>
            <!-- Edit Profile Button -->
            <div class="col-lg-2 col-4 text-light align-self-center">
                <button class="btn btn-edit" data-toggle="modal" data-target="#edit-profile">تعديل البروفايل</button>
            </div>
        </div>
    </div>
    <!-- ==================================================
                      End Profile Section
    ================================================== -->

    <!-- ==================================================
                      Start Content Section
    ================================================== -->


    <div class="container text-right">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <!-- Create Post Form -->
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif



        <div class="row my-4">


            <!-- NavBar List -->
            <div class="col-2 d-none d-lg-block">
           @include('partials.sidebar');
            </div>
            <div class="col-lg-10 col-12">
                <!-- Doctors -->
                <div class="row justify-content-between mt-2">
                    <div class="col-lg-4 col-5">
                        <p class="h2 text-light mr-2">كورساتي</p>
                    </div>
                    <div class="col-lg-3 col-4 text-left">
                        <button class="btn btn-edit" data-toggle="modal" data-target="#create-content">اضافة محتوي جديد</button>
                    </div>
                </div>

                <div class="row justify-content-around my-4">
                    <div class="col-11">
                        <table class="table text-light text-center">
                            <thead>
                            <tr>
                                <th class="text-right" scope="col">الكورس</th>
                                <th scope="col">المادة</th>
                                <th scope="col">القسم</th>
                                <th scope="col">الفرقة</th>
                                <th class="d-max-none" scope="col">الترم</th>
                                <th class="d-max-none" scope="col">عدد المشاهدات</th>
                                <th class="d-max-none" scope="col">نتائج الكويز</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th class="text-right">الدايوت</th>
                                <td>‫‪‬‬الالكترونية</td>
                                <td>كهربا</td>
                                <td>الاولي</td>
                                <td class="d-max-none">الاول</td>
                                <td class="d-max-none">5000</td>
                                <td class="d-max-none">صيفررر</td>
                                <td><button class="btn btn-edit" data-toggle="modal" data-target="#edit-course">تعديل</button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==================================================
                      End Content Section
    ================================================== -->


    <!-- ==================================================
                    Start Edit Profile Model Section
    ================================================== -->
    <div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body bg-model">
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <br>
                    <div class="contect">
                        <div class="container">
                            <form class="" action="{{route('profile.teacher')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row align-items-center mt-3">
                                <div class="col-2">
                                    <div class="edit-profile-image text-right">
                                        <img class="rounded-circle" src="{{render_image($user->image)}}" height="108" width="108" alt="" title="">
                                        <button class="btn " type="button">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
                                        <input type="file" name="image" id="lol" style="display: none;">
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="show-profile-name">
                                        <p class="name">{{$user->name}}</p>
                                        <p class="job">أستاذ مساعد رئيس - قسم مجلس الشيوخ</p>
                                    </div>
                                </div>
                            </div>

                                <div class="row w-75 mx-auto">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-grey float-right" for="name">إسم المستخدم</label>
                                            <input class="form-control dark-input" id="name" type="text" autocomplete="off" placeholder="{{$user->name}}" name="name">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-grey float-right" for="name">البريد الإلكتروني</label>
                                            <input class="form-control dark-input" id="name" type="email" autocomplete="off" value="{{$user->email}}" name="email">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-grey float-right" for="job">الوظيفة</label>
                                            <input class="form-control dark-input" id="job" type="text"  value="{{$teacher->job}}" name="job">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-grey float-right" for="bio">النبذة التعريفية</label>
                                            <textarea class="form-control dark-input" id="bio" type="text" rows="3"  name="bio">{{$teacher->bio}}</textarea>
                                        </div>
                                    </div>


                                    <div class="col-12 mt-3">
                                        <div class="row justify-content-around">

                                            <input class="btn btn-outline-save" type="submit" value="حفظ " >
                                            <input class="btn btn-outline-delete"  value="إلغاء" data-dismiss="modal">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==================================================
                    End Edit Profile Model Section
    ================================================== -->


@endsection

