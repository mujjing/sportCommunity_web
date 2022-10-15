<?php

namespace App\Http\Controllers;

use App\Repositories\HomeRepository;

class HomeLogic
{
    
    public function __construct(HomeRepository $homeRepo)
    {
        $this->homeRepo = $homeRepo;
    }

    public function getShops()
    {
        return $this->homeRepo->get();
    }
}
