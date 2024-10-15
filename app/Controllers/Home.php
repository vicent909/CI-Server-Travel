<?php

namespace App\Controllers;

use CodeIgniter\Security\CheckPhpIni;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
        // return CheckPhpIni::run(false);
    }
}
