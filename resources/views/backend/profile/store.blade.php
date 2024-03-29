@extends('backend.dashboard.layout')

@section('title',
    request()->routeIs('create.profile')
    ? config('apps.title.create.member-new')
    : config('apps.title.update.member-update')
)
@section('css')
    <link href="{{ asset('dashboard/css/upload-image.css') }}" rel="stylesheet">
@endsection

@section('content-dashboard')
{{-- {{ dd($user) }} --}}
<div class="row">
    <div class="col-md-7 col-sm-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">{{
                    request()->routeIs('create.profile')
                    ? config('apps.title.create.member-new')
                    : config('apps.title.update.member-update')
                }}</h5>
            </div>
            <div class="card-body">
                <form action="{{
                        request()->routeIs('create.profile')
                        ? route('store.profile')
                        : route('update.profile')
                    }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="user_name">Họ và tên <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="user_name" class="form-control" value="{{ old('name', ($user->name) ?? '') }}">
                                @error('name')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', ($user->email) ?? '') }}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @if (request()->routeIs('create.profile'))
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
                            @endif
                            <div class="form-group">
                                <label for="number_phone">Số điện thoại</label>
                                <input type="text" name="phone" id="number_phone" class="form-control" value="{{ old('phone', ($user->phone) ?? '') }}">
                            </div>

                            @php
                                $roleUser = [
                                    'Chọn vai trò thành viên',
                                    'Khách Hàng (Guest)',
                                    'Quản trị hệ thống (Admin)',
                                    'Nhân viên đăng bài (Posting Staff)'
                                ];
                            @endphp
                            <div class="form-group">
                                <label for="number_phone">Vai trò thành viên <span class="text-danger">*</span></label>
                                <select class="form-control text-left" name="role_user">
                                    @foreach ($roleUser as $key => $item)
                                        <option {{ $key == old('role_user', (isset($user->role_user)) ? $user->role_user : '') ? 'selected' : '' }}
                                            value="{{ $key }}">{{ $item }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_user')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ old('address', ($user->address) ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="about_me">Giới thiệu bản thân</label>
                                <textarea name="about_me" id="about_me" class="form-control textarea">{{ old('about_me', ($user->about_me) ?? '') }}</textarea>
                            </div>
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round">Tạo mới</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="file-upload">
                                    <label for="feature_image_path">Hình ảnh</label>
                                    <div class="image-upload-wrap" style="{{ ($user->image) ? 'display: none' : '' }}">
                                        <input id="feature_image_path"
                                            class="file-upload-input form-control-file"
                                            name="image" type='file'
                                            onchange="readURL(this);" accept="image/*"
                                            value="{{ old('image', ($user->image) ?? '') }}"/>
                                        <div class="drag-text">
                                            <h3>Tải ảnh đại diện</h3>
                                        </div>
                                    </div>
                                    <div class="file-upload-content" style="{{ ($user->image) ? 'display: block' : '' }}">
                                        <img id="feature_upload_image"
                                            class="file-upload-image form-control-file"
                                            src="{{ old('image', ($user->image) ?? '#') }}"
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
