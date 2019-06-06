<?php
use App\Models\Round;
use App\Models\Quiz;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $quizzes = Quiz::whereStatus('published')->get();
    return view('welcome')->with('quizzes', $quizzes);
});

Route::get('round/{id}/{type}', function($id, $type){
    $round = Round::find($id);
    //dd($round);
    return view('round')
        ->with('round', $round)
        ->with('type', $type);
});

Auth::routes();


Route::prefix('admin')->group(function () {
    Route::get('home', 'HomeController@index')->name('home');

    Route::get('quiz/{id}', 'HomeController@quiz');
    Route::get('quiz/{id}/round/new', 'RoundController@roundForm');
    Route::post('quiz/{id}/round/new', 'RoundController@submitRoundForm');

    Route::get('round/{id}', 'RoundController@round');
    Route::get('round/delete/{id}', 'RoundController@delete');

    //new question/song routes
    Route::get('round/{id}/question/new', 'QuestionController@questionForm');
    Route::post('round/{id}/question/new', 'QuestionController@submitQuestionForm');
    Route::get('round/{id}/song/new', 'QuestionController@questionForm');
    Route::post('round/{id}/song/new', 'QuestionController@submitQuestionForm');

    Route::get('question/{id}', 'QuestionController@editQuestionForm');
    Route::get('song/{id}', 'QuestionController@editSongForm');
    Route::post('question/{id}', 'QuestionController@submitQuestionForm');
    Route::post('song/{id}', 'QuestionController@submitQuestionForm');

    Route::get('song/delete/{id}', 'QuestionController@deleteSong');
    Route::get('question/delete/{id}', 'QuestionController@delete');
});

