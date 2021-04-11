<?php
namespace App\Contracts;

interface SeasonRepositoryInterface
{


    public function fetchAll($type);
    public function fetchById($id);
    public function delete($id);
    public function update($user);

}
