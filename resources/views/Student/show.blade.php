@extends('layouts.app')

@section('pagetitle')
Student Show
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Student Details</div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Student ID</td>
                        <td>{{$student->studID}}</td>
                    </tr>
                    <tr>
                        <td>Student Name</td>
                        <td>{{$student->name}}</td>
                    </tr>
                    <tr>
                        <td>Student Email</td>
                        <td>{{$student->email}}</td>
                    </tr>
                    <tr>
                        <td>Subject Taken</td>
                        <td>
                            <table class="table table-bordered">
                                @php($i=1)
                                <tr>
                                    <th>No.</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Credit Hours</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($student->subject as $sub)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $sub->code }}</td>
                                    <td>{{ $sub->name }}</td>
                                    <td>{{ $sub->creditHours }}</td>
                                    <td>{{ $sub->type }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Add Subject</td>
                        <td>
                            <form method="post" action="{{ route('scm.student.addSubject',$student) }}">
                            @csrf
                                <select name="subject_id[]" class="form-select" multiple>
                                    @foreach($subjects as $sub) 
                                        <option value="{{ $sub->id }}">{{ $sub->code }} {{ $sub->name }}</option>
                                    @endforeach
                                </select>
                                <input type="submit" class="btn btn-warning"/>
                            </form>
                            
                            <form method="post" action="{{ route('scm.student.dropSubject', $student) }}">
                            @csrf
                                <button type="submit" class="btn btn-danger">Drop All</button>
                            </form>
                        </td>
                        <td>
                       
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center">
            <a class="btn btn-warning " href="{{route('scm.student.index')}}">Back</a>
            <a class="btn btn-primary" href="{{route('scm.student.edit',$student->id)}}">Edit Details</a>
        </div>

    </div>
@endsection