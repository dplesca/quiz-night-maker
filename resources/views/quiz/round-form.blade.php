@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Add new round</h3>
            <form method="post">
                @csrf
                <input type="hidden" name="quiz_id" value="{{$quiz_id}}">
                <div class="form-group row">
                    <label for="title" class="col-3 col-form-label">Round title</label> 
                    <div class="col-5">
                    <input id="title" name="title" type="text" class="form-control" required="required">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type" class="col-3 col-form-label">Round type</label> 
                    <div class="col-2">
                    <select id="type" name="type" class="custom-select" required="required">
                        <option value="text">Text</option>
                        <option value="song">Song</option>
                    </select>
                    </div>
                </div> 
                <div class="form-group row">
                    <div class="offset-3 col-9">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
