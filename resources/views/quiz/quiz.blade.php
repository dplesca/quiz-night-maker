@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>quiz: {{$quiz->title}}</h1>
            <div style="margin:10px 0;">
                <a href="/admin/quiz/{{$quiz->id}}/round/new" class="btn btn-info">Add new round</a>
            </div>
            <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Round</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quiz->rounds as $round)
                <tr>
                    <td>{{$round->id}}</td>
                    <td><a href="/admin/round/{{$round->id}}">{{$round->title}}</a></td>
                    <td>{{ ucfirst($round->type) }}</td>
                    <td><a href="/admin/round/delete/{{$round->id}}" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
