<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
class AccessTokenController extends Controller
{
    //

    public function issueToken(Request $request) {

        $request->request->add([
            'username' => $request->username,
            'password' => $request->password,
            'grant_type' => 'password',
            'client_id' => 2,
            'client_secret' => 'yI2J8wwEGM1qAlLJOc4JUi3zhmvqvu5iaXFRgXRi',
            'scope' => '*'
        ]);

        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        return Route::dispatch($proxy);
    }

}
