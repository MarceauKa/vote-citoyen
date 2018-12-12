<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        flash()->info("Cette fonctionnalité sera bientôt disponible !");
        return redirect()->route('home');
    }
}
