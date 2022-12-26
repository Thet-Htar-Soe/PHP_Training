{{-- Create Success Msg --}}
@if (session('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success d-flex justify-content-between" role="alert">
                {{ session('success') }}
                <a href="{{ url('/major') }}" class="btn btn-outline-dark">&times;</a>
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
                <a href="{{ url('/major') }}" class="btn btn-outline-dark">&times;</a>
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
                <a href="{{ url('/major') }}" class="btn btn-outline-dark">&times;</a>
            </div>
        </div>
    </div>
@endif
@extends('./../include.template')
@section('contents')
    <?php $i = 1; ?>
    <div class="col-4 offset-4">
        <div class="card">
            <div class="card-header">
                <h3>Majors</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href={{ url('/') }} class="btn btn-secondary">Back</a>
                    <a href={{ url('major/create') }} class="btn btn-primary">Create</a>
                </div>

                <table class="table table-striped">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($majors as $major)
                        <tr>
                            <td><?php echo $i;
                            $i++; ?></td>
                            <td>{{ $major->name }}</td>
                            <td>
                                <a href={{ url('major/edit/' . $major->id) }}
                                    class="btn btn-sm btn-info text-light">Update</a>
                                <form action={{ url('/major/delete/' . $major->id) }} method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn btn-sm btn-danger delete-btn">Delete</div>
                                    <div class="alert alert-danger position-absolute top-50 start-50 translate-middle col-md-10 delete-box"
                                        role="alert" style="display:none;">
                                        <small>Are You Sure You Want To Delete?</small>
                                        <div class="d-flex justify-content-between mt-3">
                                            <a href="{{ url('/major') }}" class="btn btn-sm btn-secondary">Cancel</a>
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
