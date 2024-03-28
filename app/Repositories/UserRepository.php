<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\User;

/**
 * Class UserRepository
 * @package App\Repository
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAllPaginate()
    {
        return User::latest()->paginate(15);
    }
}

