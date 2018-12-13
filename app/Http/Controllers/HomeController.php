<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $current_polls = Cache::remember('home-current-polls', 5, function () {
            return Poll::isCurrent()->orderBy('ends_at', 'ASC')->get();
        });

        $pending_polls = Cache::remember('home-pending-polls', 5, function () {
            return Poll::isPending()->orderBy('starts_at', 'ASC')->get();
        });

        $ended_polls = Cache::remember('home-ended-polls', 5, function () {
            return Poll::isEnded()->orderBy('ends_at', 'DESC')->take(5)->get();
        });

        $proposed_polls = Cache::remember('home-proposed-polls', 5, function () {
            return Poll::isProposed()->take(5)->get();
        });

        return view('home')->with([
            'page_title' => 'Accueil',
            'page_description' => "vote-citoyen.fr permet à chacun de s'exprimer.",
            'current_polls' => $current_polls,
            'pending_polls' => $pending_polls,
            'proposed_polls' => $proposed_polls,
            'ended_polls' => $ended_polls,
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
