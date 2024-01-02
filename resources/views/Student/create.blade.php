@extends('layouts.app')

@section('content')
    <div class="container">
        @if($student->id)<!-- TO CHECK ID ALREADY EXIST OR NOT -->
            <form action="{{ route('scm.student.update', $student->id) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
        @else
            <form action="{{ route('scm.student.store') }}" method="post" >
        @endif
        @csrf
            <div class="card">
                <div class="card-header">Add New Student</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Student ID</td>
                            <td>
                                <input type="text" class="form-control" name="studID" value="{{ old('studID', $student->studID) }}">
                                @error('studID')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Student Name</td>
                            <td>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $student->name) }}">
                                @error('name')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Student Email</td>
                            <td>
                                <input type="email" class="form-control" name="email" value="{{ old('email', $student->email) }}">
                                @error('email')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning " href="{{route('scm.student.index')}}">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
