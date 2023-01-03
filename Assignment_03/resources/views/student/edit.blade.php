@extends('./../include.template')
@section('contents')
    <div class="col-4 offset-4">
        <div class="card">
            <div class="card-header">
                <h3>Student Update</h3>
            </div>
            <div class="card-body">
                <form action={{ url('student/update/' . $student->id) }} method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $student->name }}">
                        @error('name')
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $student->email }}">
                        @error('email')
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
                        @error('phone')
                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="3">{{ $student->address }}</textarea>
                        @error('address')
                            <small class="text-danger">{{ $errors->first('address') }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Major</label>
                        <select name="major_id" class="form-select">
                            <option selected value={{ $student->major->id }}>{{ $student->major->name }}</option>
                            @foreach ($majors as $major)
                                <option value={{ $major->id }}>{{ $major->name }}</option>
                            @endforeach
                        </select>
                        @error('major_id')
                            <small class="text-danger">{{ $errors->first('major_id') }}</small>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between form-group mt-2">
                        <a href={{ url('/student') }} class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
