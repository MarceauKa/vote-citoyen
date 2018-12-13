<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{
    public function show(Request $request, int $id, string $name)
    {
        $poll = Poll::findOrFail($id);
        $answer = Auth::check() ? Answer::pollAndUserAre($poll, $request->user())->first() : null;

        return view('poll.show')->with([
            'page_title' => $poll->name,
            'page_description' => $poll->description,
            'poll' => $poll,
            'answer' => $answer
        ]);
    }
}
