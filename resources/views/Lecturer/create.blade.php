@extends('layouts.app')

@section('content')
    <div class="container">
        @if($lecturer->id)<!-- TO CHECK ID ALREADY EXIST OR NOT -->
            <form action="{{ route('scm.lecturer.update', $lecturer->id) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
        @else
            <form action="{{ route('scm.lecturer.store') }}" method="post" >
        @endif
            @csrf
            <div class="card">
                <div class="card-header">Add New Lecturer</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Lecturer ID</td>
                            <td>
                                <input type="text" class="form-control" name="lectID" value="{{ old('lectID', $lecturer->lectID) }}">
                                @error('lectID')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Lecturer Name</td>
                            <td>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $lecturer->name) }}">
                                @error('name')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Lecturer Email</td>
                            <td>
                                <input type="email" class="form-control" name="email" value="{{ old('email', $lecturer->email) }}">
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
                <a class="btn btn-warning " href="{{route('scm.lecturer.index')}}">Back</a>
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
