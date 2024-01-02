@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Lecturer Details</div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Lecturer ID</td>
                        <td>{{ $lecturer->lectID }}</td>
                    </tr>
                    <tr>
                        <td>Lecturer Name</td>
                        <td>{{ $lecturer->name }}</td>
                    </tr>
                    <tr>
                        <td>Lecturer Mobile</td>
                        <td>{{ $lecturer->email }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center">
            <a class="btn btn-warning " href="{{route('scm.lecturer.index')}}">Back</a>
            <a class="btn btn-primary" href="{{route('scm.lecturer.edit',$lecturer->id)}}">Edit Details</a>
        </div>

    </div>
@endsection