@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header bg-success">
            <h4 class="text-light">New Task</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('/store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="task" class="col-sm-3 fw-bold">Task</label>
                    <div>
                        <input type="text" name="name" id="task-name" class="form-control">
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <small class="text-danger">{{ $error }}</small>
                        @endforeach
                    @endif
                </div>
                <div class="form-group mt-3">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-outline-success">
                            <i class="fa fa-plus"></i> Add Task
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header bg-success">
            <h4 class="text-light">Current Tasks</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped task-table">
                <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr class="position-relative">
                            <td class="table-text col-md-8">
                                <div>{{ $data->name }}</div>
                            </td>
                            <td>
                                <a href="{{ url('/edit/' . $data->id) }}" class="btn btn-primary d-inline"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ url('/delete/' . $data->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn btn-danger delete-btn">
                                        <i class="fas fa-trash"></i><input type="hidden" name="" value="DELETE">
                                    </div>
                                    <div class="alert alert-danger position-absolute top-50 start-50 translate-middle col-md-10 delete-box"
                                        role="alert" style="display:none;">
                                        <small>Are You Sure You Want To Delete?</small>
                                        <div class="d-flex justify-content-between mt-3">
                                            <a href="{{ url('/') }}" class="btn btn-sm btn-secondary">Cancel</a>
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
