@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Task for project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.index') }}" title="Go backs"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>
    <!-- errors afvangen -->
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
    <!-- FORM.... -->
    <form action="{{ route('tasks.store') }}" method="POST" >
    @csrf <!-- bedoeld als extra bescherming; werkt met tokenbeveiliging zodat form
		niet zomaar door robot ingevuld kan worden. -->

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Days:</strong>
                    <input type="text" name="days" class="form-control" placeholder="Days">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hours:</strong>
                    <input type="text" name="hours" class="form-control" placeholder="Hours">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <!-- hidden project_id meenemen -->
                    <input type="hidden" name="project_id" class="form-control" placeholder="Project_id" value="{{ $project_id }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection
