<?php
namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    public function login($user)
    {

        $checkUser = Auth::attempt($user);
        if ($checkUser) {
            Auth::user();
            return true;

        }
        return false;

    }

    public function fetchAll($type)
    {
        return [
            'all' => User::all(),
        ][$type];

    }

    public function fetchById($id)
    {
        return User::find($id);

    }

    public function update($user)
    {

    }

    public function delete($id)
    {

    }
    public function logout()
    {
        Auth::logout();
        return true;
    }

}
