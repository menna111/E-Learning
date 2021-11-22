
@extends('layouts.app')
@section('title', 'الصفحة الرئيسية |النتائج')

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

                        <div class="w-100"></div>
                        <div class="col-lg-4 col-12 mt-4">

                        </div>
                    </div>


                    <div class="row justify-content-around my-4">
                        <div class="col-11">
                            <table class="table text-light text-center">
                                <thead>
                                   <tr>
                                    <th class="text-right" scope="col">اسم الطالب</th>
                                    <th scope="col">الدرجة</th>


                                   </tr>

                                </thead>
                                <tbody>

                                @forelse($result as $item)
                                    <tr>
                                        <th class="text-right">{{$item->student->user->name}}</th>
                                        <td>{{$item->result}}</td>
                                    </tr>
                                @empty
                                    <tr><td colspan="7">لا يوجد نتائج حتى الان</td></tr>
                                @endforelse
                                </tbody>
                            </table>
                                {{ $result->links()}}
{{--                            {!! $result->links() !!}--}}
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
        <div class="modal fade" id="content" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body bg-model">
                        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <br>
                        <div class="contect" id="variable_content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ==================================================
                        End Edit Model Section
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
                                                <p class="job">{{$teacher->job}}</p>
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

