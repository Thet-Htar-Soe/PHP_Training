{{-- Create Success Msg --}}
@if (session('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success d-flex justify-content-between" role="alert">
                {{ session('success') }}
                <a href="{{ url('/student') }}" class="btn btn-outline-dark">&times;</a>
            </div>
        </div>
    </div>
@endif
{{-- Update Success Msg --}}
@if (session('update'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success d-flex justify-content-between" role="alert">
                {{ session('update') }}
                <a href="{{ url('/student') }}" class="btn btn-outline-dark">&times;</a>
            </div>
        </div>
    </div>
@endif
{{-- Delete Success Msg --}}
@if (session('delete'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger d-flex justify-content-between" role="alert">
                {{ session('delete') }}
                <a href="{{ url('/student') }}" class="btn btn-outline-dark">&times;</a>
            </div>
        </div>
    </div>
@endif
@extends('./../include.template')
@section('contents')
    <?php $i = 1; ?>
    <div class="col-10 offset-1">
        <div class="card">
            <div class="card-header">
                <h3>Students</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href={{ url('/') }} class="btn btn-secondary">Back</a>
                    <a href={{ url('student/create') }} class="btn btn-primary">Create</a>
                </div>
                <table class="table table-striped">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Major</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($students as $student)
                        <tr>
                            <td><?php echo $i;
                            $i++; ?></td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->major->name }}</td>
                            <td>{{ $student->created_at->format('Y-M-d') }}</td>
                            <td>
                                <a href={{ url('student/edit/' . $student->id) }} class="btn btn-sm btn-info">Update</a>
                                <form action={{ url('student/delete/' . $student->id) }} method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn btn-sm btn-danger delete-btn">Delete</div>
                                    <div class="alert alert-danger position-absolute top-50 start-50 translate-middle col-md-3 delete-box"
                                        role="alert" style="display:none;">
                                        <small>Are You Sure You Want To Delete?</small>
                                        <div class="d-flex justify-content-between mt-3">
                                            <a href="{{ url('/student') }}" class="btn btn-sm btn-secondary">Cancel</a>
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
