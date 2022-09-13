@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  {{ $project->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.index') }}" title="Go back"> <i class="fa fa-backward"></i> </a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/tasks/create/{{ $project->id }}" title="Add a new task"> <i class="fas fa-plus-circle"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $project->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $project->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Days:</strong>
                {{ $project->days }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Created:</strong>
                {{ date_format($project->created_at, 'jS M Y') }}
            </div>
        </div>

        <!--RelatedTasks-->
        <!--RelatedTasks-->
        en de laatste </div>
    <div class="container">
        <table class="table table-bordered table-responsive-lg">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>days</th>
                <th>hours</th>
                <th>Date Created</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($project->tasks as $task)

                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->days }}</td>
                    <td>{{ $task->hours }}</td>
                    <td>{{ date_format($task->created_at, 'jS M Y') }}</td>
                    <td>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">

                            <a href="{{ route('tasks.show', $task->id) }}" title="show">
                                <i class="fas fa-eye text-success  fa-lg"></i>
                            </a>

                            <a href="{{ route('tasks.edit', $task->id) }}" title="edit">
                                <i class="fas fa-edit  fa-lg"></i>
                            </a>
                            <a href="{{ route('tasks.show', $task->id) }}" title="tasks">
                                <i class="fas fa-file-alt fa-lg"></i>
                            </a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" title="delete task {{$task->name}}" style="border: none; background-color:transparent;">
                                <i class="fas fa-trash fa-lg text-danger"></i>

                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    </div>
@endsection



