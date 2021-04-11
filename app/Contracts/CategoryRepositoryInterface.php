<?php
namespace App\Contracts;

interface CategoryRepositoryInterface
{

    public function store($country);
    public function update($country);
    public function fetchAll($type);
 
}
