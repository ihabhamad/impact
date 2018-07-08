<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class siteSettings extends Controller
{
    //

    public function __construct()
    {
       $this->middleware('auth:admin');
    }

    public function store(Request $request) {


    }




}
