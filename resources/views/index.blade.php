@extends('layouts.main')

@section('content')

    <h1 class="mb-4">All students</h1>


        <div class="mb-6">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}  
                </div> <br/>
            @endif
        @if(count($student) ==0)
            <p>There are no students at the moment.</p><br/>
            <a href="/projects">Go back to projects</a><br/>
        @else
            <div class="data">
                <table class="text1" cellpadding="5" border="1">
                    <thead>
                        <tr valign="middle">
                            <th>Name </th>
                            <th>Project title / Group </th>
                            <th class="text-center">More actions</th>
                        </tr>
                    </thead>
                        <tbody>
                        @foreach($student as $students)
                        <tr>
                            <td class="text2">{{$students->name}}</td>
                            <td class="text2">{{$title[$students->group_id]}}</td>
                            <td class="text-center">
                                <a href="{{ route('students.edit', $students->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                            <form action="{{ route('students.destroy', $students->id)}}" method="post" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection