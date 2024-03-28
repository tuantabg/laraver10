<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRegisterRequest;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;

class ProfileController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->paginate();

        return view('backend.profile.index', compact('users'));
    }

    public function create()
    {
        return view('backend.profile.create');
    }

    public function store(AuthRegisterRequest $request)
    {
        if($this->userService->create($request)) {
            return redirect()->route('user.profile')->with('success','Thêm mới thành viên thành công.');
        }

        return redirect()->route('create.profile')->with('error','Thêm mới thành viên không thành công, hãy thử lại.');
    }
}
