<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnswerController extends Controller
{
    public function store(Request $request, int $id)
    {
        $poll = Poll::isCurrent()->userHasNoVote($request->user())->findOrFail($id);

        $validation = Validator::make($request->all(), [
            'consent' => ['present', 'filled'],
            'content' => ['present', 'in:yes,no'],
            'captcha' => ['required', 'captcha'],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $answer = new Answer([
            'user_id' => $request->user()->id,
            'poll_id' => $poll->id,
            'content' => $request->get('content') == 'yes' ? 'yes' : 'no',
            'ip_address' => $request->ip(),
        ]);

        $answer->save();

        flash()->overlay("Votre vote a bien été pris en compte !", 'Information');
        return redirect()->back();
    }
}
