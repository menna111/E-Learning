<!-- ==================================================
                           Start NavBar
        ================================================== -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand mx-auto" href="home.html">{{env('APP_NAME')}}</a>
    <div class="collapse navbar-collapse" dir="ltr" id="navbarSupportedContent" style="z-index: 9999999;">
        <ul class="navbar-nav nav-links">
            <li class="nav-item">
                <a class="nav-link text-light course-btn" href="courses.html">الكورسات</a>
            </li>


        </ul>
        <ul class="navbar-nav ml-auto nav-user">
            <div class="row">
                @guest
                <div class="col-6">
                    <li class="nav-item">
                        <a href="{{route('student.register')}}" type="button" class="btn btn-login">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            سجل الان
                        </a>
                    </li>
                </div>
                <div class="col-6">
                    <li class="nav-item">
                        <a href="{{route('login')}}" type="button" class="btn btn-login">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            تسجيل الدخول
                        </a>
                    </li>
                </div>
                @else
                    <div class="col-6">
                        <form id="logout-form" action="{{route('logout')}}" method="post" class="d-none">
                            @csrf
                        </form>
                        <li class="nav-item">
                            <a href="{{route('logout')}}" type="button" class="btn btn-login" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                تسجيل الخروج
                            </a>
                        </li>
                    </div>
                @endguest
            </div>
        </ul>
    </div>
</nav>
<!-- ==================================================
                    End NavBar
================================================== -->
