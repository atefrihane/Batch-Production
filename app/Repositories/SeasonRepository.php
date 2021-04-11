<?php
namespace App\Repositories;

use App\Contracts\SeasonRepositoryInterface;
use App\Modules\Season\Models\Season;

class SeasonRepository implements SeasonRepositoryInterface
{

    public function fetchAll($type)
    {
        return [
            'all' => Season::all(),
        ][$type];

    }

    public function fetchById($id)
    {
        return Season::find($id);

    }

    public function update($user)
    {

    }

    public function delete($id)
    {

    }

}
