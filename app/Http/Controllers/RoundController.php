<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Round;

class RoundController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function roundForm($quizID, Request $request) 
    {
        return view('quiz.round-form')
            ->with('quiz_id', $quizID);
    }

    public function submitRoundForm($quizID, Request $request)
    {
        $values = $request->only(['title', 'type', 'quiz_id']);
        $round = new Round($values);
        $round->save();
        return redirect('/quiz/' . $quizID);
    }

    public function round($id, Request $request)
    {
        $round = Round::find($id);
        return view('quiz.round')->with('round', $round);
    }

    public function delete ($id)
    {
        $q = Round::find($id);
        $quizID = $q->quiz_id;
        $q->delete();

        return redirect('/quiz/' . $quizID);
    }
}
