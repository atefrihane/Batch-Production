<?php

namespace App\Modules\User\Controllers;

use App\Contracts\CategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Contracts\UserRepositoryInterface;
use App\Contracts\CountryRepositoryInterface;
use App\Contracts\QualityRepositoryInterface;
use App\Contracts\StatisticRepositoryInterface;

class UserController extends Controller
{
    private $users, $statistics, $categories;
    public function __construct(
        UserRepositoryInterface $users,
        StatisticRepositoryInterface $statistics,
        CountryRepositoryInterface $countries,
        QualityRepositoryInterface $qualities,
        CategoryRepositoryInterface $categories
    ) {
        $this->users = $users;
        $this->statistics = $statistics;
        $this->countries = $countries;
        $this->qualities = $qualities;
        $this->categories = $categories;
    }

    public function showHome()
    {

        return view('User::showHome', [
            'statistics' => $this->statistics->getStats(),
            'countries' => $this->countries->fetchAll('all'),
            'qualities' => $this->qualities->fetchAll('all'),
            'countCategories' => $this->categories->fetchAll('count'),
        ]);
    }
    public function handleLogin()
    {
        $validatedData = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $checkLogin = $this->users->login($validatedData);
        if ($checkLogin) {
            if (auth()->user()->isAdmin()) {
                return redirect()->route('showHome');
            }
            return redirect()->route('showBatches');
        }

        alert()->error('Wrong credentials', 'Oups!')->persistent('Cancel');
        return redirect()->back();
    }

    public function handleLogout()
    {

        $checkLogout = $this->users->logout();
        if ($checkLogout) {
            return redirect()->back();
        }

        alert()->error('Something went wrong', 'Oups!')->persistent('Cancel');
        return redirect()->back();
    }

    public function showUpdateUser($id)
    {
        $checkUser = $this->users->fetchById($id);
        if ($checkUser) {

            return view('User::showUpdateUser', [
                'user' => $checkUser,
            ]);
        }
        return view('showNotFound');
    }
}
