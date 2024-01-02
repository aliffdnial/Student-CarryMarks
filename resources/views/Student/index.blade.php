@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>List of Students</h1>
            
                <table class="float-end">
                    <td><a href="{{ route('scm.student.create') }}" class="btn btn-primary" name="">Add New Student</a></td>
                </table>
            </div>
            <div class="card-body">
                @php($i=1)
                <table class=table>
                    <tr>
                        <th>No.</th>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $student->studID }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>
                                <form action="{{ route('scm.student.destroy',$student->id) }}" method="post">
                                    <a href="{{route('scm.student.edit',$student->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('scm.student.show',$student->id)}}" class="btn btn-info">Details</a>
                                
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection