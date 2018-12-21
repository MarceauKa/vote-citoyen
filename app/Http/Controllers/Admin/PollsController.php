<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Poll;
use App\Models\Support;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PollsController extends Controller
{
    public function index()
    {
        $polls = Poll::withCount('supports', 'answers')->paginate(50);

        return view('admin.polls')->with([
            'page_title' => 'Votes',
            'polls' => $polls,
        ]);
    }

    public function edit(Request $request, int $id)
    {
        $poll = Poll::with('owner')->withCount('supports', 'answers')->findOrFail($id);

        return view('admin.poll-form')->with([
            'page_title' => 'Modifier vote n°' . $poll->id,
            'poll' => $poll,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $poll = Poll::with('owner')->withCount('supports', 'answers')->findOrFail($id);

        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:10', 'max:100'],
            'description' => ['required', 'string', 'min:10', 'max:3000'],
            'starts_at' => ['nullable', 'date_format:' . Poll::DATE_FORM_FORMAT],
            'ends_at' => ['nullable', 'date_format:' . Poll::DATE_FORM_FORMAT],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $poll->name = $request->get('name');
        $poll->description = $request->get('description');
        $poll->starts_at = empty($request->starts_at) ? null : Carbon::createFromFormat(Poll::DATE_FORM_FORMAT, $request->starts_at);
        $poll->ends_at = empty($request->ends_at) ? null : Carbon::createFromFormat(Poll::DATE_FORM_FORMAT, $request->ends_at);
        $poll->save();

        flash()->success('Le vote a bien été modifié !', 'Information');
        return redirect()->back();
    }

    public function clearSupports(Request $request, int $id)
    {
        $poll = Poll::withCount('supports')->findOrFail($id);

        if ($poll->supports_count > 0) {
            Support::where('poll_id', $id)->delete();
        }

        flash()->success("Soutiens supprimés !");
        return redirect()->back();
    }

    public function clearAnswers(Request $request, int $id)
    {
        $poll = Poll::withCount('answers')->findOrFail($id);

        if ($poll->answers_count > 0) {
            Answer::where('poll_id', $id)->delete();
        }

        flash()->success("Réponses supprimées !");
        return redirect()->back();
    }
}
