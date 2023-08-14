<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Final</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <style>
      .linktoprofile{
        text-decoration: none;
        font-size: 18px;
      }
    </style>
    {{-- 
      
      primary - #007bff
      secondary - #6c757d
      success - #28a745
      danger - #dc3545
      warning - #ffc107
      info - #17a2b8
      light - #f8f9fa
      dark - #343a40
      muted - #6c757d
      white - #ffffff
      
      --}}
      

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>{{env('APP_NAME')}}</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
      main{
        background: #fbfbfb;
      }
    .form-control:focus {
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    } 
    #sideimg{
        background-image: url()
    }
    </style>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
          <div class="container">
            
            <a class="navbar-brand" href="{{route('home')}}" style="color: #fb503b"><img src="{{asset('branding/laravel-logo.png')}}" style="width: auto; height:50px;" alt="">Final</a>
            @auth
                <button class="navbar-toggler hidden-lg-up" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
              {{-- <form class="d-flex my-2 my-lg-0 justify-content-center">
                <input class="form-control me-sm-2" type="text" placeholder="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
              </form> --}}
              <ul class="navbar-nav mt-lg-0 px-5">
                  {{-- <p class="px-5"></p>
                  <p class="px-5"></p>
                  <p class="px-5"></p>
                  <p class="px-5"></p>
                  <p class="px-5"></p>
                  <p class="px-5"></p>
                  <p class="px-5"></p>
                  <p class="px-5"></p>
                  <p class="px-5"></p> --}}

                  <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-xs rounded-circle" src="{{asset(Auth::user()->pic)}}" style="width: 40px;height: 40px;overflow:hidden;" alt=""></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                      <a class="dropdown-item" href="/cc/{{Auth::user()->username}}">پروفایل</a>
                      @if(Auth::user()->isadmin)
                      <a class="dropdown-item" href="{{route('adminpanel')}}">پنل مدیریت</a>
                      @endif
                      <a class="dropdown-item" href="{{route('user.postlist')}}">مدیریت پست ها</a>
                      <a class="dropdown-item" href="{{route('createpost')}}">ساخت پست جدید</a>
                      <a class="dropdown-item text-danger" href="{{route('logout')}}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit()">خروج</a>
                    </div>
                  </li>

                </div>
                  <form action="{{route('logout')}}" method="post" id="logout-form">@csrf</form>5803
              </ul>
            </div>
            @else
            <ul class="navbar-nav mt-2 mt-lg-0"> 
                {{--  me-auto --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}" aria-current="page">ثبت نام</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}" aria-current="page">ورود</span></a>
                </li>
            </ul>
            @endauth
          </div>
        </nav>
      </header>
      <main>
        {{-- STARTS --}}
        <div style="height: 150px"></div>
          @yield('content')
        <div style="height: 150px"></div>
        {{--  ENDS  --}}
      </main>
      <footer class="footer fixed-bottom">
        <div class="container-fluid clearfix bg-dark"  style="height: 30px"></div>
        <div class="container-fluid clearfix bg-dark">
          <span class="text-light text-center px-2" style="position: relative; bottom: 15px;">Copyrigth &copy; 2022</span>
          <span class="text-light text-center px-2" style="position: relative; bottom: 15px;">حق نشر &copy; سال 1401</span>
        </div>
      </footer>
      <!-- Bootstrap JavaScript Libraries -->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
      </script>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
      </script>
</body>
</html>
