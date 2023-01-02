@extends('./../include.template')
@section('contents')

    <div class="col-4 offset-4">
        <div class="card">
            <div class="card-header">
                <h3>Major Update</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('major/update/' . $major->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Major Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $major->name }}" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <small class="text-danger">{{ $error }}</small>
                        @endforeach
                    @endif
                    <div class="d-flex justify-content-between form-group mt-2">
                        <a href={{ url('/major') }} class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
