@extends('layouts.main')

@section('content')

    <h1 class="mb-4">Edit student info</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    @if ($msg = Session::get('msg'))
        <div class="alert alert-success alert-block">
        <strong>Error: {{ $msg }}</strong>
    </div>
    @endif
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('patch')

            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" value="{{ old('name', $student->name) }}" name="name" id="name" required autofocus>
            </div>
            <div class="form-group">
                <label for="group">Group</label>
                    <select name="group_id" required>
                        @foreach ($groups as $group) {
                            <option value="{{ $group->id }}"
                            @if($group->id == $student->group_id) selected
                            @endif
                            > {{ $group->title}}
                        </option>
                        @endforeach
                    </select> <br/>
                </div>

            <input class="btn btn-success mt-4" type="submit" value="Edit"/>
            <a class="btn btn-warning mt-4" role="button" href="/students">Go back </a>
        </form>
    
@endsection
