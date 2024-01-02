@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Subject Details</div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Subject Code</td>
                        <td>{{$subject->code}}</td>
                    </tr>
                    <tr>
                        <td>Subject Name</td>
                        <td>{{$subject->name}}</td>
                    </tr>
                    <tr>
                        <td>Credit Hours</td>
                        <td>{{$subject->creditHours}}</td>
                    </tr>
                    <tr>
                        <td>Subject Type</td>
                        <td>{{$subject->type}}</td>
                    </tr>
                    <tr>
                        <td>Taugh By</td>
                        <td>{{$subject->lecturer->name}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center">
            <a class="btn btn-warning " href="{{route('scm.subject.index')}}">Back</a>
            <a class="btn btn-primary" href="{{route('scm.subject.edit',$subject->id)}}">Edit Details</a>
        </div>

    </div>
@endsection