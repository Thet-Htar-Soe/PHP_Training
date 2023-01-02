@extends('./../include.template')

@section('contents')
    <div class="card">
        <div class="card-header">
            <h3>Admin Dashboard</h3>
        </div>
        <div class="card-body">
            <div>
                <a href={{ url('major') }} class="btn btn-primary">Majors</a>
                <a href={{ url('ajax/students') }} class="btn btn-primary">Students</a>
            </div>
        </div>
    </div>
@endsection
