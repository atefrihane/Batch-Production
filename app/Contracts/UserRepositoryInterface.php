<?php
namespace App\Contracts;

interface UserRepositoryInterface
{

    public function login($user);
    public function fetchAll($type);
    public function delete($id);
    public function update($user);
    public function logout();
}
