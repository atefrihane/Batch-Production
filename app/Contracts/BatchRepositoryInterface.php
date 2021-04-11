<?php
namespace App\Contracts;

interface BatchRepositoryInterface
{


    public function fetchAll($type);
    public function fetchById($id);
    public function delete($id);
    public function update($user);

}
