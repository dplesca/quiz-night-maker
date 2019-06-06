@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1><a href="/admin/quiz/{{$round->quiz_id}}" class="btn btn-secondary btn-sm">&laquo;</a> round: {{$round->title}}</h1>
            <div style="margin:10px 0;">
                @if ($round->type == "text")
                <a href="/admin/round/{{$round->id}}/question/new" class="btn btn-info">Add new question</a>
                @else
                <a href="/admin/round/{{$round->id}}/song/new" class="btn btn-info">Add new song</a>
                @endif
            </div>
            <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    @if ($round->type == "text")
                    <th>Answer</th>
                    @endif
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($round->type == "text")
                @foreach ($round->questions as $question)
                <tr>
                    <td>{{$question->order}}</td>
                    <td><a href="/admin/question/{{$question->id}}">{{$question->question}}</a></td>
                    <td>{{$question->answer}}</td>
                    <td><button class="btn btn-secondary btn-sm">Edit</button> <a href="/admin/question/delete/{{$question->id}}" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                @endforeach
                @else
                @foreach ($round->songs as $song)
                <tr>
                    <td>{{$song->order}}</td>
                    <td><a href="/admin/song/{{$song->id}}">{{$song->artist}} - {{ $song->song }}</a></td>
                    <td><button class="btn btn-secondary btn-sm">Edit</button> <a href="/admin/song/delete/{{$song->id}}" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                @endforeach
                @endif
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
