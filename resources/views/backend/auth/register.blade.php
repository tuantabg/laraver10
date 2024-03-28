@extends('backend.auth.layout')

@section('title', 'Sign Up Form')

@section('content')
<div class="signup-content">
    <div class="signup-form">
        <h2 class="form-title">Đăng ký</h2>
        <form method="POST" action="{{ route('auth.register.store') }}" class="register-form" id="register-form">
            @csrf
            <div class="form-group">
                <div class="position-relative">
                    <label for="name"><i class="zmdi zmdi-account material-icons-name @error('name') text-danger @enderror"></i></label>
                    <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror" placeholder="Tên của bạn" />
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <div class="position-relative">
                    <label for="email"><i class="zmdi zmdi-email @error('email') text-danger @enderror"></i></label>
                    <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror" placeholder="Email của bạn" />
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <div class="position-relative">
                    <label for="pass"><i class="zmdi zmdi-lock @error('password') text-danger @enderror"></i></label>
                    <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror" placeholder="Mật khẩu" />
                </div>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <div class="position-relative">
                    <label for="re-pass"><i class="zmdi zmdi-lock-outline @error('password_confirmation') text-danger @enderror"></i></label>
                    <input type="password" name="password_confirmation" id="re_password" class="@error('password_confirmation') is-invalid @enderror"
                    placeholder="Lặp lại mật khẩu của bạn" />
                </div>
                @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                <label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý tất cả các tuyên bố trong
                    <a href="#" class="term-service">Điều khoản dịch vụ</a></label>
            </div>
            <div class="form-group form-button">
                <input type="submit" name="signup" id="signup" class="form-submit"
                    value="Đăng ký" />
            </div>
        </form>
    </div>
    <div class="signup-image">
        <figure><img src="{{ asset('colorlib-regform-7/images/signup-image.jpg') }}" alt="sing up image"></figure>
        <a href="{{ route('auth.login') }}" class="signup-image-link">Tôi đã là thành viên</a>
    </div>
</div>
@endsection

