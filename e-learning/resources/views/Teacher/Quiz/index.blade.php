@extends('layouts.app')
@section('title', 'الصفحة الرئيسية |الاختبارات')
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

        <div class="row my-4">

            <!-- NavBar List -->
            <div class="col-2 d-none d-lg-block">
            @include('partials.sidebar');

            </div>
            <div class="col-lg-10 col-12">
                <!-- Doctors -->
                <div class="row mt-2">
                    <div class="col-lg-4 col-5">
                        <p class="h2 text-light mr-2">إنشاء كويز جديد</p>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-lg-4 col-12 mt-4">
                        <div class="new-quiz ">
                            <div class="circle">
                                <a href="">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row justify-content-around my-4">
                    <div class="col-11">
                        <table class="table text-light text-center">
                            <thead>
                            <tr>
                                <th class="text-right" scope="col">الكويز</th>
                                <th scope="col">المادة</th>
                                <th scope="col">عدد الطلبة</th>
                                <th scope="col">مرئي</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @forelse($quizzes as $quiz)
                                <th class="text-right">الدايوت</th>
                                <td>كهربا</td>
                                <td>الاولي</td>
                                <td>الاولي</td>
                                <td>الاولي</td>
                                <td>الاولي</td>

                                <td><button class="btn btn-edit" data-toggle="modal" data-target="#edit-course">تعديل</button></td>
                                @empty
                                    <td colspan="7">لا يوجد كويزات حتى الان</td>
                                @endforelse
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
                    Start Edit Model Section
    ================================================== -->
    <div class="modal fade" id="edit-course" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body bg-model">
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <br>
                    <div class="contect">
                        <h5 class="text-yellow text-center">تعديل المحتوي</h5>
                        <div class="container w-lg-75">
                            <form action="">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-light float-right" for="name">الاسم</label>
                                            <input class="form-control input-circle" id="name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="form-group">
                                            <label class="text-light float-right" for="name">التخصص</label>
                                            <input class="form-control input-circle" id="name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="form-group">
                                            <label class="text-light float-right" for="name">الفرقة</label>
                                            <input class="form-control input-circle" id="name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="form-group">
                                            <label class="text-light float-right" for="name">الترم</label>
                                            <input class="form-control input-circle" id="name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="form-group">
                                            <label class="text-light float-right" for="name">المادة</label>
                                            <input class="form-control input-circle" id="name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-light float-right" for="name">رابط الفيديو</label>
                                            <input class="form-control input-circle" id="name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-light float-right" for="name">الوصف</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="الرسالة"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-light float-right" for="name">ملاحظات</label>
                                            <input class="form-control input-circle" id="name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12 text-right">
                                        <button class="btn btn-edit">
                                            حفظ
                                        </button>
                                        <button class="btn btn-edit mr-2">
                                            حذف المحتوي
                                        </button>
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
                    End Edit Model Section
    ================================================== -->

    <!-- ==================================================
                    Start Create Model Section
    ================================================== -->
    <div class="modal fade" id="create-content" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content bg-model">
                <div class="modal-body">
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <br>
                    <div class="contect">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="nav nav-tabs justify-content-around" id="myTab" role="tablist">
                                        <li class="nav_item pb-1">
                                            <a class="active text-light" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">كورس جديد</a>
                                        </li>
                                        <li class="nav_item pb-1">
                                            <a class="text-light" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">محاضرة جديدة</a>
                                        </li>
                                        <li class="nav_item pb-1">
                                            <a class="text-light" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">خبر</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="container  w-lg-75">
                                                <form action="" class="mt-4">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="text-light float-right" for="name">اسم الكورس</label>
                                                                <input class="form-control input-circle" id="name" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group arraw-white">
                                                                <label class="text-light float-right" for="name">التخصص</label>
                                                                <select class="form-control input-circle" id="exampleFormControlSelect1">
                                                                    <option></option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group arraw-white">
                                                                <label class="text-light float-right" for="name">الفرقة</label>
                                                                <select class="form-control input-circle" id="exampleFormControlSelect1">
                                                                    <option></option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group arraw-white">
                                                                <label class="text-light float-right" for="name">الترم</label>
                                                                <select class="form-control input-circle" id="exampleFormControlSelect1">
                                                                    <option></option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group arraw-white">
                                                                <label class="text-light float-right" for="name">المادة</label>
                                                                <select class="form-control input-circle" id="exampleFormControlSelect1">
                                                                    <option></option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="text-light float-right" for="name">الوصف</label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="الرسالة"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-right">
                                                            <button class="btn btn-edit">
                                                                انشاء
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="container  w-lg-75">
                                                <form action="" class="mt-4">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group arraw-white">
                                                                <label class="text-light float-right" for="name">الاسم</label>
                                                                <select class="form-control input-circle" id="exampleFormControlSelect1">
                                                                    <option></option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group arraw-white">
                                                                <label class="text-light float-right" for="name">التخصص</label>
                                                                <select class="form-control input-circle" id="exampleFormControlSelect1">
                                                                    <option></option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group arraw-white">
                                                                <label class="text-light float-right" for="name">الفرقة</label>
                                                                <select class="form-control input-circle" id="exampleFormControlSelect1">
                                                                    <option></option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group arraw-white">
                                                                <label class="text-light float-right" for="name">الترم</label>
                                                                <select class="form-control input-circle" id="exampleFormControlSelect1">
                                                                    <option></option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group arraw-white">
                                                                <label class="text-light float-right" for="name">المادة</label>
                                                                <select class="form-control input-circle" id="exampleFormControlSelect1">
                                                                    <option></option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="text-light float-right" for="name">رابط الفيديو</label>
                                                                <input class="form-control input-circle" id="name" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="text-light float-right" for="name">الوصف</label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="text-light float-right" for="name">ملاحظات</label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-right">
                                                            <button class="btn btn-edit">
                                                                انشاء
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                            <form action="" class="mt-4">
                                                <div class="row w-75 mx-auto justify-content-center">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control dark-input" id="exampleFormControlTextarea1" rows="7"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group arraw-black-l">
                                                            <label class="text-light float-right" for="name">التخصص </label>
                                                            <select class="form-control dark-input" id="exampleFormControlSelect1">
                                                                <option></option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group arraw-black-l">
                                                            <label class="text-light float-right" for="name">الفرقة  </label>
                                                            <select class="form-control dark-input" id="exampleFormControlSelect1">
                                                                <option></option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group ">
                                                            <label class="text-light float-right" for="name">المجموعة</label>
                                                            <input class="form-control dark-input" type="text" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group ">
                                                            <label class="text-light float-right" for="name">السكشن</label>
                                                            <input class="form-control dark-input" type="text" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <input class="btn btn-outline-delete" type="submit" value="إلغاء">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==================================================
                    End Create Model Section
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
                                            <input class="btn btn-outline-delete"  value="إلغاء">
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
