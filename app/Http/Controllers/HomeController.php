<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $polls = Poll::isValid()->canBeAnswered()->get();
        $count_pending_polls = Poll::isNotValid()->count();
        $count_ended_polls = Poll::isValid()->isEnded()->count();

        return view('home')->with([
            'page_title' => 'Accueil',
            'page_description' => "vote-citoyen.fr permet à chacun de s'exprimer.",
            'polls' => $polls,
            'count_ended_polls' => $count_ended_polls,
            'count_pending_polls' => $count_pending_polls,
        ]);
    }

    public function terms()
    {
        return view('terms')->with([
            'page_title' => "Conditions générales d'utilisation",
            'page_description' => "Conditions générales d'utilisation du site vote-citoyen.fr.",
        ]);
    }
}
