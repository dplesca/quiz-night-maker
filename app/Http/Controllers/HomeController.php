<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Round;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $quizzes = Quiz::all();
        return view('home')->with('quizzes', $quizzes);
    }

    public function quiz($id, Request $request)
    {
        $quiz = Quiz::find($id);
        return view('quiz.quiz')->with('quiz', $quiz);
    }

    
}
