@extends('./../include.template')
@section('contents')
    <div class="col-4 offset-4">
        <div class="card">
            <div class="card-header">
                <h3>Import Students</h3>
            </div>
            <div class="card-body">
                <form action={{ url('student/import') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-3">
                        <input type="file" name="file" class="form-control" />
                        @error('file')
                            <small class="text-danger">{{ $errors->first('file') }}</small>
                        @enderror
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <a href={{ url('student') }} class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
