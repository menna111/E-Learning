@extends('layouts.app')
@section('title', 'الصفحة الرئيسية |الاسئلة')
@section('css')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endsection
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
                        <p class="h2 text-light mr-2">إضافة سؤال جديد</p>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-lg-4 col-12 mt-4">
                        <div class="new-quiz ">
                            <div class="circle">
                                <a href="" data-toggle="modal" data-target="#content" id="create_question">
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
                                <th class="text-right" scope="col">السؤال</th>

                                <th scope="col"></th>
                                <th scope="col"></th>


                            </tr>
                            </thead>
                            <tbody>

                                @forelse($questions as $question)
                                    <tr>
                                <th class="text-right">{{$question->content}}</th>



                                    <td>
                                        <button class="btn btn-edit">
                                            <a href="" class="text-black text-decoration-none" data-toggle="modal" data-target="#content"  onclick="editQuestion({{$question->id}})">
                                                تعديل
                                            </a>
                                        </button>
                                    </td>

                                    <td>
                                        <button class="btn btn-edit bg-danger">
                                            <a href="" class="text-white text-decoration-none"  id="" onclick="deleteQuestion({{$question->id}})"  data-toggle="modal" data-target="#exampleModal">
                                               حذف
                                            </a>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                    <tr><td colspan="7">لا يوجد أسئلة حتى الان</td></tr>

                                @endforelse
                            </tbody>
                        </table>
{{--                      {{ $quizzes->links() }}--}}
                      {!! $questions->links() !!}
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


        <!-- ==================================================
                start delete question Model Section
================================================== -->



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body bg-model">
                        <h5 style="color: white">هل تريد حذف السؤال ؟</h5>
                    </div>
                    <div class="modal-footer bg-model">
                        <button type="button" class="btn btn-edit" data-dismiss="modal">الغاء</button>
                        <button type="button" class="btn btn-edit" >تأكيد</button>
                    </div>
                </div>
            </div>
        </div>




        <!-- ==================================================
                     end delete question Model Section
     ================================================== -->


        @endsection
@section('script')

    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#create_question').click((e)=>{
            e.preventDefault()
            $.ajax({
                type: "GET",
                url: `{{route('question.create',$quiz->id)}}`,
                success:function (response){
                    $('#variable_content').html(response)
                }

            } )
        });
     function editQuestion(id){
            $.ajax({
                type: "GET",
                url: `{{url('/quiz/question/edit')}}/${id}`,
                success:function (response){
                    $('#variable_content').html(response)
                }


     } )
         $('#content').modal('hide');

     }

        function deleteQuestion(id){
            $.ajax({
                type: "GET",
                url: `{{url('/quiz/question/delete')}}/${id}`,
                success:function (response){
                    $('#variable_content').html(response)
                }


            } )
            $('#content').modal('hide');

        }

    </script>

    @endsection
