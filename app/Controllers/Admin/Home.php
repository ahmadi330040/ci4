<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Webiste My Pay',
        ];
        return view('dashboard/pages/home', $data);
    }

}
