<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Poll;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PollController extends Controller
{
    public function show(Request $request, int $id, string $name)
    {
        $poll = Cache::remember('poll-' . $id, 5, function () use ($id) {
            return Poll::with('owner')->withCount('supports')->findOrFail($id);
        });

        $answer = Auth::check() && $poll->is_current ? Answer::pollAndUserAre($poll, $request->user())->first() : null;
        $support = Auth::check() && $poll->is_proposed ? Support::pollAndUserAre($poll, $request->user())->first() : null;

        return view('poll.show')->with([
            'page_title' => $poll->name,
            'page_description' => $poll->description,
            'poll' => $poll,
            'answer' => $answer,
            'support' => $support,
        ]);
    }
}
