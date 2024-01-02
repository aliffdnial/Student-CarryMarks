@extends('layouts.app')

@section('content')
    <div class="container">
        @if($subject->id)<!-- TO CHECK ID ALREADY EXIST OR NOT -->
            <form action="{{ route('scm.subject.update', $subject->id) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
        @else
            <form action="{{ route('scm.subject.store') }}" method="post" >
        @endif
        @csrf
            <div class="card">
                <div class="card-header">Add New Subject</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Subject Code</td>
                            <td>
                                <input type="text" class="form-control" name="code" value="{{ old('code', $subject->code) }}">
                                @error('code')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Subject Name</td>
                            <td>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $subject->name) }}">
                                @error('name')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Credit Hours</td>
                            <td>
                                <select class="form-control" name="creditHours">
                                <option value="">-- Please Select --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                </select>
                                @error('creditHours')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Type <span style="color: red">*</span></th>
                            <td>
                                <select class="form-control" name="type">
                                <option value="">-- Please Select --</option>
                                <option value="Core">Core</option>
                                <option value="Specialization">Specialization</option>
                                <option value="MPU U1">MPU U1</option>
                                <option value="MPU U2">MPU U2</option>
                                <option value="Free Module">Free Module</option>
                                <option value="Technical Elective">Technical Elective</option>
                                <option value="Industrial Training">Industrial Training</option>
                                <option value="Final Year Project">Final Year Project</option>
                                </select>
                                @error('type')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                            <tr>
                            <th>Taught By <span style="color: red">*</span></th>
                            <td>
                                <select class="form-control" name="lecturer_id">
                                    @foreach($lecturer as $lect)
                                    <option value="{{ $lect->id }}">{{ $lect->name }}</option>
                                    @endforeach
                                </select>
                                @error('lecturer_id')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                
                            </td>
                        </tr>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning " href="{{route('scm.subject.index')}}">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
