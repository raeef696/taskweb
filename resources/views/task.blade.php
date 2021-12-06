@extends('layout.master')

@section('content')


<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                New Task
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->
                <!-- New Task Form -->
                <!-- /resources/views/post/create.blade.php -->


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Create Post Form -->
                <form action="{{url('adduser')}}" method="POST" class="form-horizontal">
                    @csrf
                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control"  value="">
                        </div>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default" >
                                <i class="fa fa-btn fa-plus"></i>Add Task
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
                @if (session('done'))
                <div class="alert alert-success text-center" role="alert">
                    {{session('done')}}
                </div>
                @endif
                @if (session('done-delete'))
                <div class="alert alert-danger text-center" role="alert">
                    {{session('done-delete')}}
                </div>
                @endif
                @if(session('done-update'))
                <div class="alert alert-success text-center" role="alert">
                    {{session('done-update')}}
                </div>
                @endif
        <!-- Current Tasks -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Tasks
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Task</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $index=>$task)
                            <tr>
                                <td class="table-text"><div>{{$task->name}}</div></td>
                                <!-- Task Delete Button -->
                                <td>
                                    <form action="{{url('delete/'.$task->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <form action="{{url('edite/'.$task->id)}}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-btn fa-pencil"></i>Updete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>

@endsection
