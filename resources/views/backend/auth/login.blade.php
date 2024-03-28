@extends('backend.auth.layout')

@section('title', 'Sign Up Form')

@section('content')
<div class="signin-content">
    <div class="signin-image">
        <figure><img src="{{ asset('colorlib-regform-7/images/signin-image.jpg') }}" alt="sing up image"></figure>
        <a href="{{ route('auth.register') }}" class="signup-image-link">Tạo một tài khoản</a>
    </div>

    <div class="signin-form">
        <h2 class="form-title">Đăng nhập</h2>
        <form method="POST" action="{{ route('auth.login.store') }}" class="register-form" id="login-form">
            @csrf
            <div class="form-group">
                <div class="position-relative">
                    <label for="email">
                        <i class="zmdi zmdi-email material-icons-name @error('email') text-danger @enderror"></i>
                    </label>
                    <input type="text" name="email" id="email"
                        class="@error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="Email của bạn"/>
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <div class="position-relative">
                    <label for="password">
                        <i class="zmdi zmdi-lock material-icons-pass @error('password') text-danger @enderror"></i>
                    </label>
                    <input type="password" name="password" id="password"
                        class="@error('password') is-invalid @enderror"
                        placeholder="Mật khẩu"/>
                </div>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                <label for="remember-me" class="label-agree-term">
                    <span><span></span></span>Nhớ đến tôi
                </label>
            </div>
            <div class="form-group form-button">
                <input type="submit" name="signin" id="signin" class="form-submit" value="Đăng nhập"/>
            </div>
        </form>
        <div class="social-login">
            <span class="social-label">Hoặc đăng nhập với</span>
            <ul class="socials">
                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
            </ul>
        </div>
    </div>
</div>
@endsection

