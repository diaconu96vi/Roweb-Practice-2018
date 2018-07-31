@extends('layouts.base')

@section('content')
    <p>BACK TO <a href="{{URL::to('/tasks')}}">TASKS</a> PAGE </p>

    <div class="container-fluid">
        <!-- <div class="col-md-8"> -->

        <div class="box">
            <div class="box-header">
                <h2>
                    Edit task: {{ $task->name }} | ID: {{ $task->id }}
                </h2>

            </div>
            <div class="container">
                {{ Form::model($task, array('route' => array('tasks.update', $task->id), 'method' => 'PUT')) }}

                <div class="form-group">
                    {{ Form::label('name', 'New name') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('description', 'New description') }}
                    {{ Form::text('description', null, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('status', 'New status') }}
                    {{ Form::text('status', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('assign', 'New user to assign') }}
                    {{ Form::text('assign', null, array('class' => 'form-control')) }}
                </div>


                {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
            <hr>
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
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

@endsection
