@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form method="post" action="/task/{{$task->task_id}}">
                        @csrf
                        @method("put")
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" value="{{ @old('title', $task->title) }}" class="form-control" type="text" name="title">
                </div>
                <div class="form-group">
                    <label for="due_date">Due Date</label>
                    <input id="due_date" value="{{ @old('due_date', $task->due_date) }}" class="form-control" type="date" name="ue_dated">
                </div>
                <button class="btn btn-primary float-left" type="submit">Submit</button>
                <a class="btn btn-danger float-left" href="/task/{{$task->task_id}}/delete">Delete</a>
            </form>

            </div>
        </div>
    </div>
</div>
@endsection
