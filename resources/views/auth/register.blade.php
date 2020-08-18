<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register ShopYuk</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="{{asset('admin/login/assets/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/login/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/login/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/login/assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/login/assets/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{asset('admin/login/assets/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/login/assets/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/login/assets/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{asset('admin/login/assets/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/login/assets/css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/login/assets/css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/login/assets/css/custom.css')}}">
<!--===============================================================================================-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('{{asset('admin/login/assets/images/bg-01.jpg')}}');">
      <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
      <img src="https://i.imgur.com/xKDmdum.png" style="width:150px;margin-left:150px;" alt="Shooping" class="navbar-brand">
        <form method="POST" action="{{ route('register') }}" class="login100-form validate-form flex-sb flex-w">
          @csrf
          <span class="login100-form-title p-b-10" style="font-size:30px;margin-top:15px;">
            Daftar 
          </span>

          <div class="p-t-31 p-b-9">
            <span class="txt1">
              Name
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Name is required">
            <input class="input100" type="text" name="name" id="name">
            <span class="focus-input100"></span>
          </div>

          @if ($errors->has('name'))
              <script>
                swal({
                      title: "Gagal Mendaftar",
                      text: "{{ $errors->first('name') }}",
                      icon: "error",
                      button: "Konfirmasi",
                    });
              </script>
          @endif
          
          <div class="p-t-31 p-b-9">
            <span class="txt1">
              Email
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Email is required">
            <input class="input100" type="email" name="email" id="email">
            <span class="focus-input100"></span>
          </div>

          @if ($errors->has('email'))
            <script>
                swal({
                      title: "Gagal Mendaftar",
                      text: "{{ $errors->first('email') }}",
                      icon: "error",
                      button: "Konfirmasi",
                    });
              </script>
          @endif
          
          <div class="p-t-13 p-b-9">
            <span class="txt1">
              Password
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="password" id="password">
            <span class="focus-input100"></span>
          </div>

          @if ($errors->has('password'))
              <script>
                swal({
                      title: "Gagal Mendaftar",
                      text: "{{ $errors->first('password') }}",
                      icon: "error",
                      button: "Konfirmasi",
                    });
              </script>
          @endif

          <div class="p-t-13 p-b-9">
            <span class="txt1">
              Confirm Password
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="password_confirmation" id="password2">
            <span class="focus-input100"></span>
          </div>  

          <div class="container-login100-form-btn m-t-17">
            <button class="login100-form-btn" id="daftar">
              Buat
            </button>
          </div>

          <div class="w-full text-center p-t-55">
            <span class="txt2">
              Sudah memiliki akun?
            </span>

            <a href="{{ url('login') }}" class="txt2 bo1">
              Masuk
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="{{asset('admin/login/assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('admin/login/assets/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('admin/login/assets/vendor/bootstrap/js/popper.js')}}"></script>
  <script src="{{asset('admin/login/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('admin/login/assets/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('admin/login/assets/vendor/daterangepicker/moment.min.js')}}"></script>
  <script src="{{asset('admin/login/assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('admin/login/assets/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('admin/login/assets/js/main.js')}}"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
         setInterval(function(){
          $('#daftar').css('background', '#2196f3').fadeIn("slow");
        }, 400);
        setInterval(function(){
          $('#daftar').css('background', '#222').fadeIn("slow");
        }, 800);

    </script>

</body>
</html>