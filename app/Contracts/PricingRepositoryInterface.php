<?php
namespace App\Contracts;

interface PricingRepositoryInterface
{


    public function fetchAll($type);
    public function fetchById($id);
    public function delete($id);
    public function update($user);

}
