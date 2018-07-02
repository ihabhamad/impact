<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index() {

        return view('admin.settings.settings');
    }
}
