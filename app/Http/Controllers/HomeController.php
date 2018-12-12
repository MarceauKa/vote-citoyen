<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with([
            'page_title' => 'Accueil',
            'page_description' => "vote-citoyen.fr permet à chacun de s'exprimer.",
            'polls' => Poll::all(),
        ]);
    }
}
