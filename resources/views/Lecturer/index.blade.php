@extends ('layouts.app')

@section('content')
    <div class="container">
    
        <div class="card">
            <div class="card-header">
                <h1>List of Lecturers</h1>    
                
                <table class="float-end">
                    <td><a href="{{ route('scm.lecturer.create') }}" class="btn btn-primary" name="">Add New Lecturer</a></td>
                </table>
            
            </div>
            <div class="card-body">
                @php($i=1)
                <table class=table>
                    <tr>
                        <th>No.</th>
                        <th>Lecturer ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    @foreach($lecturers as $lecturer)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $lecturer->lectID }}</td>
                            <td>{{ $lecturer->name }}</td>
                            <td>{{ $lecturer->email }}</td>
                            <td>
                                <form action="{{ route('scm.lecturer.destroy',$lecturer->id) }}" method="post">
                                    <a href="{{route('scm.lecturer.edit',$lecturer->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('scm.lecturer.show',$lecturer->id)}}" class="btn btn-info">Details</a>
                                    
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