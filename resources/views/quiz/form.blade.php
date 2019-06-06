@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($type == 'text')
            @if (isset($question))
            <h3>Edit question</h3>
            @else 
            <h3>Add new question</h3>
            @endif
            <form method="post">
                @csrf
                <input type="hidden" name="type" value="{{$type}}">
                @if (isset($question))
                <input type="hidden" name="question_id" value="{{$question->id}}">
                @else
                <input type="hidden" name="round_id" value="{{$round_id}}">
                @endif
                <div class="form-group row">
                    <label for="question" class="col-3 col-form-label">Question</label> 
                    <div class="col-9">
                        <textarea id="question" name="question" cols="40" rows="3" class="form-control" required="required">@if (isset($question)){{$question->question}}@endif</textarea>
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="answer" class="col-3 col-form-label">Answer</label> 
                    <div class="col-9">
                        <input id="answer" name="answer" type="text" class="form-control" required="required" value="@if (isset($question)){{$question->answer}}@endif">
                    </div>
                </div> 
                <div class="form-group row">
                    <div class="offset-3 col-9">
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            @elseif ($type == 'song')
            <h3>Add new song</h3>
            <form method="post">
                @csrf
                @if (isset($question))
                <input type="hidden" name="question_id" value="{{$question->id}}">
                @else
                <input type="hidden" name="round_id" value="{{$round_id}}">
                @endif
                <input type="hidden" name="type" value="{{$type}}">
                <div class="form-group row">
                    <label for="artist" class="col-3 col-form-label">Artist</label> 
                    <div class="col-6">
                        <input id="artist" name="artist" type="text" required="required" class="form-control" value="@if (isset($question)){{$question->artist}}@endif">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="song" class="col-3 col-form-label">Song Title</label> 
                    <div class="col-6">
                        <input id="song" name="song" type="text" class="form-control" required="required" value="@if (isset($question)){{$question->song}}@endif">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="youtube_id" class="col-3 col-form-label">Youtube ID</label> 
                    <div class="col-3">
                        <input id="youtube_id" name="youtube_id" type="text" class="form-control" required="required" value="@if (isset($question)){{$question->youtube_id}}@endif">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="start" class="col-3 col-form-label">Start</label> 
                    <div class="col-3">
                        <input id="start" name="start" placeholder="hh:mm:ss" type="text" class="form-control" required="required" value="@if (isset($question)){{$question->start}}@endif">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="duration" class="col-3 col-form-label">Duration</label> 
                    <div class="col-3">
                        <input id="duration" name="duration" type="text" class="form-control" required="required" value="@if (isset($question)){{$question->duration}}@endif">
                    </div>
                </div> 
                <div class="form-group row">
                    <div class="offset-3 col-9">
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
