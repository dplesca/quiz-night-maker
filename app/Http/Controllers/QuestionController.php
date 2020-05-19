<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Round;
use App\Models\Song;
use Illuminate\Http\Request;

class QuestionController extends Controller
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

    public function questionForm($roundID)
    {
        $round = Round::find($roundID);
        return view('quiz.form')
            ->with('round_id', $roundID)
            ->with('type', $round->type);
    }

    public function editQuestionForm($id)
    {
        $question = Question::find($id);
        if (is_null($question)){
            redirect('home');
        }
        return view('quiz.form')
            ->with('question', $question)
            ->with('round_id', $question->round_id)
            ->with('type', $question->round->type);
    }

    public function editSongForm($id)
    {
        $question = Song::find($id);
        if (empty($question)){
            redirect('home');
        }
        return view('quiz.form')
            ->with('question', $question)
            ->with('round_id', $question->round_id)
            ->with('type', $question->round->type);
    }

    public function submitQuestionForm($roundID, Request $request)
    {
        $type = $request->get('type');
        
        if ($type == 'text') {
            $fields = $request->only(['question', 'answer', 'image']);
            if ($request->has('question_id')) {
                $q = Question::find($request->get('question_id'));
                $q->update($fields);
                $roundID = $q->round_id;
            } else {
                $fields['round_id'] = $roundID;
                Question::addQuestion($fields);
            }
        } elseif ($type == 'song') {
            $fields = $request->only(['artist', 'song', 'start', 'youtube_id', 'duration']);
            if ($request->has('question_id')) {
                $song = Song::find($request->get('question_id'));
                $song->update($fields);
                $roundID = $song->round_id;
            } else {
                $fields['round_id'] = $roundID;
                Song::addSong($fields);
            }
        }

        return redirect('/admin/round/' . $roundID);
    }

    public function delete($qid, Request $request)
    {
        $q = Question::find($qid);
        $roundID = $q->round_id;
        $order = $q->order;
        $q->delete();

        Question::where('order', '>', $order)->decrement('order');

        return redirect('/admin/round/' . $roundID);
    }

    public function deleteSong($qid, Request $request)
    {
        $q = Song::find($qid);
        $roundID = $q->round_id;
        $order = $q->order;
        $q->delete();

        Song::where('order', '>', $order)->decrement('order');
        return redirect('/admin/round/' . $roundID);
    }
}
