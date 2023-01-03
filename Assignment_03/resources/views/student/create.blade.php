@extends('./../include.template')
@section('contents')
    <div class="col-4 offset-4">
        <div class="card">
            <div class="card-header">
                <h3>Student Create</h3>
            </div>
            <div class="card-body">
                <form action={{ url('student/store') }} method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ Request::old('name') }}" />
                        @error('name')
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="{{ Request::old('email') }}" />
                        @error('email')
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ Request::old('phone') }}" />
                        @error('phone')
                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="3">{{ Request::old('address') }}</textarea>
                        @error('address')
                            <small class="text-danger">{{ $errors->first('address') }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Major</label>
                        <select name="major_id" class="form-select">
                            <option selected disabled>Choose Your Major Here!!!</option>            
                            @foreach ($majors as $major)
                            @if(Request::old('major_id') == $major->id)
                                <option value={{ $major->id }} selected>{{ $major->name }}</option>
                            @else
                            <option value={{ $major->id }}>{{ $major->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('major_id')
                            <small class="text-danger">{{ $errors->first('major_id') }}</small>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between form-group mt-2">
                        <a href={{ url('/student') }} class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
