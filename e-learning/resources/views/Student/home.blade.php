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

{{--           error message--}}

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{--end of error message--}}

        {{--           success message--}}

    @if (session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif
        {{--end of success message--}}


        <div class="row my-4">


            <!-- NavBar List -->
            <div class="col-2 d-none d-lg-block">
            @include('partials.sidebar');
            </div>
            <div class="col-lg-10 col-12">
                <!-- Doctors -->

                <div class="row justify-content-around my-4">
                    <div class="col-11">
                        <table class="table text-light text-center">
                            <thead>
                            <tr>
                                <th class="text-right" scope="col">الكويز</th>
                                <th scope="col">المادة</th>
                                <th>درجة الامتحان </th>
                                <th class="d-max-none" scope="col">دخول الكويز</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($quizzes as $quiz)
                                @php
                                $finished=\App\Models\QuizStudent::where('quiz_id',$quiz->id)
                                ->where('student_id',$student->id)
                                ->where('finished',1)
                                ->first();
                                @endphp
                            <tr>
                                <th class="text-right">{{$quiz->title}}</th>
                                <th scope="col">{{$quiz->subject->name}}</th>
                                <th></th>

                                @if(is_null($finished))
                                <td><a href="{{route('quiz.enroll',$quiz->id)}}" class="btn btn-edit" >دخول الكويز</a></td>


                                @else
                                    <td><a href="{{route('quiz.show',$quiz->id)}}" class="btn btn-edit" >عرض الكويز</a></td>


                                @endif
                            </tr>
                            @empty
                                <tr>
                                    <th colspan="3">لايوجد كويز الى الان</th>

                                </tr>
                            @endforelse
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
                            <form class="" action="{{route('profile.student')}}" method="post" enctype="multipart/form-data">
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
                                        </div>
                                    </div>
                                </div>

                                <div class="row w-75 mx-auto">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-grey float-right" for="name">إسم المستخدم</label>
                                            <input class="form-control dark-input" id="name" type="text" autocomplete="off" placeholder="{{$user->name}}"  name="name">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-grey float-right" for="email">البريد الإلكتروني</label>
                                            <input class="form-control dark-input" id=email" type="email" autocomplete="off" value="{{$user->email}}" name="email">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-grey float-right" for="phone_number">رقم الهاتف</label>
                                            <input class="form-control dark-input" id="phone_number" type="text" autocomplete="off" value="{{$student->phone_number}}" name="phone_number">
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

