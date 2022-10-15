<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct(HomeLogic $logic)
    {
        $this->logic = $logic;
    }

    public function home()
    {
        $shopList = $this->logic->getShops();
        return view('home', compact('shopList'));
    }

    public function index()
    {
        return view('index');
    }
}
