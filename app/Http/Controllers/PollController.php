<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, int $id, string $name)
    {
        $poll = Poll::isValid()->find($id);

        return view('home')->with([
            'page_title' => $poll->name,
            'page_description' => $poll->description,
            'poll' => $poll,
        ]);
    }
}
