<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupportController extends Controller
{
    public function store(Request $request, int $id)
    {
        $poll = Poll::isCurrent()->userHasNoSupport($request->user())->find($id);

        $validation = Validator::make($request->all(), [
            'consent' => ['present', 'filled'],
            'captcha' => ['required', 'captcha'],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $support = new Support([
            'user_id' => $request->user()->id,
            'poll_id' => $poll->id,
            'ip_address' => $request->ip(),
        ]);

        $support->save();

        flash()->overlay("Votre soutien pour ce vote a bien été pris en compte !", 'Information');
        return redirect()->back();
    }
}
