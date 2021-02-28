@extends('layouts.main')

@section('content')
    <h1>Students</h1>
    <ul>
        @foreach($students as $student)
            <li><a href="{{ route('students.show', $student) }}">{{ $student->name }}</a>
        </li>
        @endforeach
    </ul>
@endsection