<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        $menuData = $this->request->menuData;
        return view('dashboard', compact('menuData'));
    }
}
