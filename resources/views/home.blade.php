@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Quiz Title</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quizzes as $quiz)
                <tr>
                    <td>{{$quiz->id}}</td>
                    <td><a href="/admin/quiz/{{$quiz->id}}">{{$quiz->title}}</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
