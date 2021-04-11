<?php
namespace App\Contracts;

interface CountryRepositoryInterface
{

    public function store($country);
    public function update($country);
    public function fetchAll($type);
 
}
