<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRegisterRequest;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\UserRepositoryInterface as userRepository;

class ProfileController extends Controller
{
    protected $userService;
    protected $userRepository;

    public function __construct(
        UserService $userService,
        UserRepository $userRepository
    ){
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userService->paginate();
        return view('backend.profile.index', compact('users'));
    }

    public function create()
    {
        return view('backend.profile.store');
    }

    public function store(AuthRegisterRequest $request)
    {
        if($this->userService->create($request)) {
            return redirect()->route('user.profile')->with('success','Thêm mới thành viên thành công.');
        }

        return redirect()->route('create.profile')->with('error','Thêm mới thành viên không thành công, hãy thử lại.');
    }

    public function edit($id)
    {
        $user = $this->userRepository->findById($id);
        return view('backend.profile.store', compact('user'));
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
