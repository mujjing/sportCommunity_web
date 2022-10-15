<?php

namespace App\Repositories;

use App\Models\Shops;

class HomeRepository extends BaseRepository
{
    protected $model;

    public function __construct(Shops $model)
    {
        $this->model = $model;
    }
}
