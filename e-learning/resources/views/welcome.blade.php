@extends('layouts.app')
@section('title','home')


@section('interface')
<!-- ==================================================
                 Start Interface
================================================== -->
<div class="container">
    <div class="interface">
        <div class="row">
            <!-- Interface Image -->
            <div class="col-lg-6 col-12 d-none d-lg-block" >
                <img class="w-100 my-5" src="img/interface_img.png" alt="">
            </div>
            <!-- Interface text -->
            <div class="col-lg-6 col-12 my-5 text-right">
                <div class="row mt-4">
                    <div class="col">
                        <p class="h1 text-light">
                            توفير اقصي سبل الراحة بين التعلم
                            والتدريس بطريقة <span class="text-yellow">مبتكره</span> ،
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <p class="h6 text-light" >
                            منصة تعليمية غير ربحية , الهدف الاسمي هو وصول المحتوي التعليمي من المحاضر الي المتلقي بأفضل طريقة
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <p class="h1 text-light">
                            اختر <span class="text-yellow">وجهتك <span>!</span></span>
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <a type="button" href="" class="btn btn-join">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            طالب
                        </a>
                        <a type="button" href="" class="btn btn-join mx-4">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            ‫محاضر‬
                        </a>
                        <a type="button" href="" class="btn btn-join">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            ‫زائر‬
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==================================================
                     End Interface
================================================== -->

@endsection
@section('color',"style=background-color:#fee132")

@section('content')




{{--Start Mid Section--}}
{{--================================================== ---}}
<section class="mid-section-home" dir="rtl">
    <div class="container">
        <p class="h7 text-center">
            من نحن
        </p>
        <p class="h5 text-center">
            أسرة زيجزاج هي نشاط طلابي غير هادف للربح تم إنشاؤه في كلية الهندسة جامعة الزقازيق ، لجميع الأقسام في عام 2017 من قبل مجموعة من طلاب الهندسة هدفها الرئيسي هو مساعدة الطلاب في جميع المجالات العلمية.
        </p>
        <div class="boxes">
            <div class="row justify-content-center mt-5">
                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                    <div class="box">
                        <img class="img-1" src="img/Group 69@4X.png" alt="">
                        <p class="h3 text-center">
                            ‫الرؤية‬
                        </p>
                        <p class="h6 text-center">
                            خلق أجيال من الطلاب كمبدعين
                            وقادة ماهرين ومبتكرين وأكثر تطوراً
                            وخبرة بالطريقة الصحيحة للتعلم وفي مختلف
                            مجالات العلوم والتكنولوجيا
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                    <div class="box ">
                        <img class="img-2" src="img/target@4X.png" alt="">
                        <p class="h3 text-center">
                            ‫الرؤية‬
                        </p>
                        <p class="h6 text-center">
                            خلق أجيال من الطلاب كمبدعين
                            وقادة ماهرين ومبتكرين وأكثر تطوراً
                            وخبرة بالطريقة الصحيحة للتعلم وفي مختلف
                            مجالات العلوم والتكنولوجيا
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                    <div class="box">
                        <img class="img-3" src="img/achievement@4X.png" alt="">
                        <p class="h3 text-center">
                            ‫الرؤية‬
                        </p>
                        <p class="h6 text-center">
                            خلق أجيال من الطلاب كمبدعين
                            وقادة ماهرين ومبتكرين وأكثر تطوراً
                            وخبرة بالطريقة الصحيحة للتعلم وفي مختلف
                            مجالات العلوم والتكنولوجيا
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="lecturer ">
            <div class="row justify-content-center mx-auto">
                <div class="col-lg-5 col-12">
                    <div class="lecturer-img">
                        <img src="img/interface_image.png" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <p class="h6">المحاضرين</p>
                    <p class="h5">
                        أسرة زيجزاج هي نشاط طلابي غير هادف للربح تم إنشاؤه في كلية الهندسة جامعة الزقازيق ، لجميع الأقسام في عام 2017 من قبل مجموعة من طلاب الهندسة هدفها الرئيسي هو مساعدة الطلاب في جميع المجالات العلمية.
                    </p>
                    <button type="button" class="btn btn-lecturer mr-3 mt-2">
                        التسجيل كمحاضر
                    </button>
                </div>
            </div>
        </div>
        <div class="lecturer">
            <div class="row">
                <div class="col-lg-7 col-12">
                    <p class="h6">المحاضرين</p>
                    <p class="h5">
                        أسرة زيجزاج هي نشاط طلابي غير هادف للربح تم إنشاؤه في كلية الهندسة جامعة الزقازيق ، لجميع الأقسام في عام 2017 من قبل مجموعة من طلاب الهندسة هدفها الرئيسي هو مساعدة الطلاب في جميع المجالات العلمية.
                    </p>
                    <button type="button" class="btn btn-lecturer mr-3 mt-2">
                        التسجيل كمحاضر
                    </button>
                </div>
                <div class="col-lg-5  mt-lg-0 mr-lg-0  mt-sm-3 mr-md-5 col-12">
                    <div class="lecturer-img">
                        <img src="img/Group 78@1X.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="circle-1">
            <img src="img/Group 81@1X.png" alt="">
        </div>
        <div class="circle-2">
            <img src="img/Group 81@1X.png" alt="">
        </div>
        <div class="circle-3">
            <img src="img/Group 81@1X.png" alt="">
        </div>
        <div class="plus-1">
            <img src="img/Path 162@1X.png" alt="">
        </div>
        <div class="plus-2">
            <img src="img/Path 162@1X.png" alt="">
        </div>
        <div class="plus-3">
            <img src="img/Path 162@1X.png" alt="">
        </div>
        <div class="plus-4">
            <img src="img/Path 162@1X.png" alt="">
        </div>
        <div class="plus-5">
            <img src="img/Path 162@1X.png" alt="">
        </div>
        <div class="rectangle-1">
            <img src="img/Group 70@1X.png" alt="">
        </div>
        <div class="rectangle-2">
            <img src="img/Group 70@1X.png" alt="">
        </div>
    </div>
</section>
<!-- ==================================================
                      End Mid Section
================================================== -->


<!-- ==================================================
                      Start Bottom Section
================================================== -->
<section class="bottom-section-home" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-12 mt-7">
                <p class="h1 text-yellow">معلومات عنا</p>
                <p class="h5 text-light">
                    زيجزاج هو نشاط طلابي غير ربحي تم إنشاؤه في كلية الهندسة
                    جامعة الزقازيق ، لجميع الأقسام في عام 2017 من قبل مجموعة من طلاب الهندسة.
                    هدفها الرئيسي هو مساعدة الطلاب في جميع المجالات العلمية.
                </p>
            </div>
            <div class="col-xl-6 col-lg-6 col-12 mt-7">
                <div class="h7 text-yellow">
                    تواصل معنا
                </div>
                <form action="">
                    <div class="form-group">
                        <input class="form-control input-circle" type="text" placeholder="الاسم">
                    </div>
                    <div class="form-group">
                        <input class="form-control input-circle" type="text" placeholder="البريد الالكتروني">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="الرسالة"></textarea>
                    </div>
                </form>
            </div>
        </div>
        <div class="cloud-1">
            <img src="img/Group 30@1X.png" alt="" >
        </div>
        <div class="cloud-2">
            <img src="img/Group 30@1X.png" alt=""  >
        </div>
        <div class="plus-1">
            <img src="img/Path 164@1X.png" alt="">
        </div>
        <div class="plus-2">
            <img src="img/Path 164@1X.png" alt="">
        </div>
        <div class="rectangle-1">
            <img src="img/Group 75@1X.png" alt="">
        </div>
    </div>
    <div class="copy-right">
        <p class="text-center text-yellow">Copyright © 2021 . All Rights Reserved. </p>
    </div>

</section>
<!-- ==================================================
                      End Bottom Section
================================================== -->



@endsection
