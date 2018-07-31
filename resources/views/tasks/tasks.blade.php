@extends('layouts.base')

@section('content')
<p>BACK TO <a href="{{URL::to('/home')}}">MAIN</a> PAGE </p>

<div class="container-fluid">
    <!-- <div class="col-md-8"> -->

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Create a task</h3>
            </div>
            <div class="container">
                <a href="#createTask" class="btn btn-info" data-toggle="collapse">Create</a>
                <div id="createTask" class="collapse">
                    <form method="POST" action="/tasks">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Task name</label>
                            <input type="text" class="form-control" id="title" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Task description</label>
                            <textarea id="body" class="form-control" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Task status</label>
                            <input id="number" class="form-control" name="status" required>
                        </div>
                        <div class="form-group">
                            <label for="user_id">Created by</label>
                            <input id="text" class="form-control" name="user_id" required>
                        </div>
                        <div class="form-group">
                            <label for="assign">Assign to</label>
                            <input id="text" class="form-control" name="assign" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create task</button>
                        </div>
                    </form>
                </div>
            </div>
            @if ($errors->any())
                <div class="form-group">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <hr>
            <div class="box-header">
                <h3 class="box-title">Current Tasks</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Created at</th>
                        <th>Modified at</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th style="width: 40px">Status</th>
                        <th>Created by</th>
                        <th>Assigned to</th>
                        <th>Options</th>
                    </tr>
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}.</td>
                        <td>{{ $task->created_at->toFormattedDateString() }}.</td>
                        <td>{{ $task->updated_at->toFormattedDateString() }}.</td>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->description }}</td>
                        <td><span class="badge bg-red">{{ $task->status }}</span></td>
                        <td>User ID: {{ $task->user_id }}</td>
                        <td>User ID: {{ $task->assign }}</td>
                        <td>
                            <span>
                                <a class="btn btn-small btn-success" href="{{ URL::to('tasks/' . $task->id . '/edit') }}">
                                    Edit
                                </a>
                                {{ Form::open(['method' => 'DELETE', 'class' => 'pull-right', 'route' => ['tasks.destroy', $task->id]]) }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                {{ Form::close() }}

                            </span>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>

@endsection
