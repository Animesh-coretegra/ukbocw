<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function dashboard()
    {        
        $menuData = $this->request->menuData;
        return view('dashboard',compact('menuData'));
    }
}
