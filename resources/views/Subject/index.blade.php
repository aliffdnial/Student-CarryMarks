@extends ('layouts.app')

@section('content')
    <div class="container">
    
        <div class="card">
            <div class="card-header">
                <h1>List of Subject</h1>
                
                <table class="float-end">
                    <td><a href="{{ route('scm.subject.create') }}" class="btn btn-primary" name="">Add New Subject</a></td>
                </table>
            </div>
            <div class="card-body">
                @php($i=1)
                <table class=table>
                    <tr>
                        <th>No.</th>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Credit Hours</th>
                        <th>Subject Type</th>
                        <th>Taught By</th>
                        <th>Action</th>
                    </tr>
                    @foreach($subjects as $subject)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $subject->code }}</td>
                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->creditHours }}</td>
                            <td>{{ $subject->type }}</td>
                            <td>{{ $subject->lecturer->name }}</td>
                            <td>
                                <form action="{{ route('scm.subject.destroy',$subject->id) }}" method="post">
                                    <a href="{{route('scm.subject.edit',$subject->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('scm.subject.show',$subject->id)}}" class="btn btn-info">Details</a>
                                    
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