@extends('backends.layouts.app')
@section('page_title','teacher create')

@section('content')
<div class="content-wrapper">
    <section class="content">
            <div class="container-fluid mt-2 ">
                <div class="row justify-content-center">
                <div class="col-md-12">

                {{-- alert message when insert successfully --}}
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                {{-- alert message when insert successfully --}}
                @if (Session::has('fail'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('fail') }}
                    </div>
                @endif

                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Teacher</h3>
                </div>
                <form method="POST" action="{{route('admin.teachers.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="firstname">First Name :</label>
                                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter First Name">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name :</label>
                                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Last Name">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender :</label>
                                    <select class="form-control" aria-label="Select Gender" name="gender" id="gender">
                                        <option value="0">Select Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date Of Birth :</label>
                                    <input type="date" name="dob" class="form-control" id="dob" placeholder="Your Date of Birth">
                                </div>
                                <div class="form-group">
                                    <label for="image">Select Image :</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                </div>
                            </div>

                            <div class="col">

                                <div class="form-group">
                                    <label for="phone">Phone :</label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Your Phone">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email :</label>
                                    <input type="text" name="email" class="form-control" id="email" placeholder="Your Phone">
                                </div>
                                <div class="form-group">
                                    <label for="position">Position :</label>
                                    <select class="form-control" aria-label="Select Gender" name="position" id="position">
                                        <option value="0">Select Teacher Position</option>
                                        <option value="1">C++ programming</option>
                                        <option value="2">Data Science</option>
                                        <option value="3">App Development</option>
                                        <option value="4">Database</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pob">Place of Birth :</label>
                                    <textarea class="form-control" name="pob" id="Txt" rows="4"></textarea>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right col-2">Submit</button>
                    </div>

                </form>
                <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
            </div>
            <!-- /.row -->
        </div>
    </section>
</div>
@endsection
