@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Task</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.index')."/".$task->project_id }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $task->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Days:</strong>
                    <input type="text" name="days" class="form-control" placeholder="{{ $task->days }}"
                           value="{{ $task->days }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hours:</strong>
                    <input type="text" name="hours" class="form-control" placeholder="{{ $task->hours }}"
                           value="{{ $task->hours }}">
                </div>
            </div>
            {{--<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Project:</strong>
                    <input type="text" name="project_id" class="form-control" placeholder="{{ $task->project->name }}"
                           value="{{ $task->project_id }}">
                </div>
            </div>--}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <select class="form-control" name="project_id">
                        @foreach ($task->project->all() as $project)
                            @if ($project->id==$task->project_id)
                                <option value="{{$project->id}}" selected>{{$project->name}}</option>
                            @else
                                <option value="{{$project->id}}">{{$project->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection

