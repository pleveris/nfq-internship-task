@extends('layouts.main')

@section('content')

    <h1 class="mb-4">Create a new project</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        @method('post')

        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" value="{{ old('title') }}" name="title" id="title" required autofocus>
        </div>
        <div class="form-group">
                                    <label for="numGroups">{{ __('Number of groups to participate in the project:') }}</label>
                                    <input type="number" min="1" step="1" name="numGroups" class="form-control" required >
                                </div>
                                <div class="form-group">
                                    <label for="numStudents">{{ __('Number of students in each group:') }}</label>
                                    <input type="number" min="1" step="1" name="numStudents" class="form-control" required >
                                </div>

        <input class="btn btn-success mt-4" type="submit" value="Create">
    </form>
    
@endsection
