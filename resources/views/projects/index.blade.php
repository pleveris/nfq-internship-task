@extends('layouts.main')

@section('content')
    <h1>Projects List</h1>
    <ul>
        @foreach($projects as $project)
            <li><a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a> </li>
        @endforeach
    </ul>
@endsection