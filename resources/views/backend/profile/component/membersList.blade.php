@if (isset($users) && is_object($users))
    @foreach ($users as $key => $user)
    <li class="tbody">
        <div class="row align-items-center">
            <div class="col-md-1 col-1">
                <div class="d-flex">
                    <input type="checkbox" value="" class="input-checkbox checkBoxItem mr-3">
                    <div class="avatar mb-0 rounded-0">
                        <img src="{{ $user->image ? $user->image : asset('dashboard/img/default-avatar.png') }}" alt="Circle Image"
                            class="img-circle img-no-padding img-responsive">
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-3">{{ $user->email }}<br />
                <span class="text-muted"><small>
                    {{ ($user->role_user == 1)
                        ? 'Khách Hàng (Guest)'
                        : (($user->role_user == 2)
                        ? 'Quản trị hệ thống (Admin)'
                        : 'Nhân viên đăng bài (Posting Staff)')
                    }}
                </small></span>
            </div>
            <div class="col-md-5 col-5">{{ $user->name }}<br />
                <span class="text-muted"><small>{{ $user->address }}</small></span>
            </div>
            <div class="col-md-1 col-1">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch{{ $loop->index }}">
                    <label class="custom-control-label" for="customSwitch{{ $loop->index }}"></label>
                </div>
            </div>
            <div class="col-md-2 col-2 text-right">
                <a href="{{ route('edit.profile', $user->id) }}" class="btn btn-sm btn-outline-success btn-round btn-icon">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="{{ route('delete.profile') }}" class="btn btn-sm btn-outline-danger btn-round btn-icon">
                    <i class="fa fa-trash"></i>
                </a>
            </div>
        </div>
    </li>
    @endforeach
@else
    <div class="row align-items-center">
        <div class="col-md-12 col-12">
            không có dữ liệu
        </div>
    </div>
@endif
