<?php

namespace App\Controllers;
use App\Models\UserModel;
class Index extends BaseController
{
    public function index()
    {
        return view('index');
    }
}