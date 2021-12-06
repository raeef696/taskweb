@extends('layout.master');


@section('content')

<form action="{{url('update/' . $task->id)}}" method="get" class="form-horizontal">
    @csrf
    <div class="form-group">
        <label for="task-name" class="col-sm-3 control-label">Task</label>

        <div class="col-sm-6">
            <input type="text" name="name" id="task-name" class="form-control" value="{{$task->name}}">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">
                <i class="fa fa-btn fa-pencil"></i>Update
            </button>
        </div>
    </div>
</form>
@endsection
