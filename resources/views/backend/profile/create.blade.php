@extends('backend.dashboard.layout')

@section('title', config('apps.title.create.member-new'))
@section('css')
    <link href="{{ asset('dashboard/css/upload-image.css') }}" rel="stylesheet">
@endsection

@section('content-dashboard')

<div class="row">
    <div class="col-md-7 col-sm-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">{{ config('apps.title.create.member-new') }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('store.profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="user_name">Họ và tên <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="user_name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pass">Mật khẩu <span class="text-danger">*</span></label>
                                <input type="password" name="password" id="pass" class="form-control">
                                @error('password')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pass">Nhập lại mật khẩu <span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" id="pass" class="form-control">
                                @error('password_confirmation')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="number_phone">Số điện thoại</label>
                                <input type="text" name="phone" id="number_phone" class="form-control" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="number_phone">Vai trò thành viên <span class="text-danger">*</span></label>
                                <select class="form-control text-left" name="role_user">
                                    <option value="0">Chọn vai trò thành viên</option>
                                    <option value="1">Khách Hàng (Guest)</option>
                                    <option value="2">Quản trị hệ thống (Admin)</option>
                                    <option value="3">Nhân viên đăng bài (Posting Staff)</option>
                                </select>
                                @error('role_user')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                            </div>
                            <div class="form-group">
                                <label for="about_me">Giới thiệu bản thân</label>
                                <textarea name="about_me" id="about_me" class="form-control textarea">{{ old('about_me') }}</textarea>
                            </div>
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round">Tạo mới</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="file-upload">
                                    <label for="feature_image_path">Hình ảnh</label>
                                    <div class="image-upload-wrap">
                                        <input id="feature_image_path"
                                            class="file-upload-input form-control-file"
                                            name="image" type='file'
                                            onchange="readURL(this);" accept="image/*" />
                                        <div class="drag-text">
                                            <h3>Tải ảnh đại diện</h3>
                                        </div>
                                    </div>
                                    <div class="file-upload-content">
                                        <img id="feature_upload_image"
                                            class="file-upload-image form-control-file"
                                            src="#"
                                            alt="your image" />
                                        <div class="image-title-wrap">
                                            <button type="button"
                                                    onclick="removeUpload()"
                                                    class="remove-image">
                                                <i class="fa fa-times nav-icon" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
    <script src="{{ asset('dashboard/js/upload-image.js') }}" type="text/javascript"></script>
@endsection
