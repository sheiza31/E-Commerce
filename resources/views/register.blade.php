<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('theme-features/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('theme-features/css/style.css')}}">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign Up</h2>
                        <form action = "{{ route('register/account') }}" method="POST" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input class = "@error('username') is-invalid @enderror)" type="text" name="username" id="name" placeholder="Enter Your Username"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email "></i></label>
                                <input class = "@error('email') is-invalid @enderror)" type="email" name="email" id="email" placeholder="Enter Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input class = "@error('password') is-invalid @enderror)" type="password" name="password" id="pass" placeholder="Enter Your Password"/>
                            </div>
                            <div class="form-group">
                                <label for="alamat"><i class="zmdi zmdi-home"></i></label>
                                <input class = "@error('alamat') is-invalid @enderror)" type="text" name="address" id="pass" placeholder="Enter Your Address"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-phone"></i></label>
                                <input class = "@error('no_telp') is-invalid @enderror)" type="telp" name="telp" id="pass" placeholder="Enter Your Number"/>
                            </div>
                            <div class="form-group form-button">
                               <button type="submit" class = "form-submit">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{asset('theme-features/images/signup-image.jpg')}}" alt="sing up image"></figure>
                        <a href="{{ route('login') }}" class="signup-image-link">I am already Have Account</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="{{asset('theme-features/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('theme-features/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>