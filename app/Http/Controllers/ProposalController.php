<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProposalController extends Controller
{
    public function create(Request $request)
    {
        return view('proposal.form')->with([
            'page_title' => 'Proposer un vote',
            'page_description' => 'Proposez votre vote à vos concitoyens',
        ]);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:10', 'max:100'],
            'description' => ['required', 'string', 'min:10', 'max:3000'],
            'captcha' => ['required', 'captcha'],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $poll = new Poll($request->only('name', 'description'));
        $poll->user_id = $request->user()->id;
        $poll->save();

        flash()->success("Votre vote a bien été proposé !");
        return redirect($poll->url);
    }
}
