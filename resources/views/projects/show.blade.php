@extends('layouts.main')

@section('content')
    <h1>{{ $project->id }}. {{ $project->title }}</h1>
    <p>Number of groups: {{ $project->numGroups }}.</p><br/>
    <p>Total students: {{$project->studentsTotal}}.</p><br/>
    <a href="{{ route('students.add', ['project' => $project]) }}">Add new student</a>
    <hr>
    <a href = "/projects">Go back to project list</a>

@endsection