{{-- Import Success Msg --}}
@if (session('import'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success d-flex justify-content-between" role="alert">
                {{ session('import') }}
                <a href="{{ url('/student') }}" class="btn btn-outline-dark">&times;</a>
            </div>
        </div>
    </div>
@endif
@extends('./../include.template')
@section('contents')
    {{-- Create Students --}}
    <div class="modal fade" id="createStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Student Create</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <form name="createStudent">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="createName" class="form-control" />
                            <small id="errorName" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="createEmail" class="form-control" />
                            <small id="errorEmail" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="createPhone" class="form-control" />
                            <small id="errorPhone" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="createAddress" class="form-control" />
                            <small id="errorAddress" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>Major</label>
                            <select name="getmajorId" class="form-select getSelect">
                                <option selected disabled value="">Choose Your Major Here!!!</option>
                            </select>
                            <small id="errorMajor" class="text-danger d-block"></small>
                        </div>
                        <div class="d-flex justify-content-between form-group mt-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal Box-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Students Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <form name="editForm">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                            <small id="errorEditName" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                            <small id="errorEditEmail" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control">
                            <small id="errorEditPhone" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control">
                            <small id="errorEditAddress" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>Major</label>
                            <select name="edit_major_id" class="form-select editSelect">
                            </select>
                            <small id="errorEditMajor" class="text-danger"></small>
                        </div>
                        <div class="d-flex justify-content-between form-group mt-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal Box-->
    <div class="modal fade" id="deleteStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are You Sure Want To Delete?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="getDeleteStudentId">Delete</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Display Students --}}
    <div class="col-10 offset-1">
        <div class="card">
            <div class="col-12"><span id="successMsg"></span></div>
            <div class="card-header d-flex justify-content-between">
                <h3>Students</h3>
                <form action={{ url('student/search') }} method="POST">
                    @csrf
                    <div class="form-group d-inline-block">
                        <input type="text" name="search" class="form-control" placeholder="Search..." />
                    </div>
                    <button type="submit" class="btn btn-sm btn-outline-primary d-inline">Search</button>
                </form>
            </div>
            <div class="card-body">
                <div class="mb-3 d-flex justify-content-between">
                    <div>
                        <a href={{ url('/') }} class="btn btn-secondary">Back</a>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#createStudent">Create</button>
                    </div>
                    <div>
                        <a href={{ url('student/import') }} class="btn btn-primary">Import</a>
                        <a href={{ url('student/export') }} class="btn btn-primary">Export</a>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Major</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
