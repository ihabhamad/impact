<?php

namespace App\Http\Controllers\api;

use App\Experiance;
use App\Guidance;
use App\ImpactNetwork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class handlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ImpactNetworks()
    {

        return ImpactNetwork::with('experiances','guidances')->get();
    }
    public function experiances()
    {

        return Experiance::all();
    }
    public function guidances()
    {

        return Guidance::all();
    }


}
