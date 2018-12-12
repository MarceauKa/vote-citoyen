<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Poll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function show(Request $request, int $id, string $name)
    {
        $poll = Poll::isValid()->find($id);
        $answer = Answer::pollAndUserAre($poll, $request->user())->first();

        return view('poll')->with([
            'page_title' => $poll->name,
            'page_description' => $poll->description,
            'poll' => $poll,
            'answer' => $answer
        ]);
    }
}
