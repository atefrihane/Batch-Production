<?php
namespace App\Contracts;

interface QualityRepositoryInterface
{

    public function store($country);
    public function update($country);
    public function fetchAll($type);
 
}
