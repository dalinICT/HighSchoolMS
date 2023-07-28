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

                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Teacher</h3>
                </div>
                <form method="POST" id="quickForm" novalidate="novalidate" action="{{ url("/admin/teacher/store")}}">
                    @csrf
                    {{-- @method('post') --}}
                    {{-- <div class="card-body">
                        <div class="form-group">
                            <label for="TeacherFirstName">First Name :</label>
                            <input type="text" name="txtFirstname" class="form-control" id="TxtFirstname" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="TeacherLastName">Last Name :</label>
                            <input type="text" name="TxtLastname" class="form-control" id="TxtLastname" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender :</label>
                            <input type="text" name="LblGender" class="form-control" id="LblGender" placeholder="Your Gender">
                        </div>
                        <div class="form-group">
                            <label for="TeacherDOB">Date Of Birth :</label>
                            <input type="text" name="TxtDob" class="form-control" id="TxtDob" placeholder="Your Date of Birth">
                        </div>
                        <div class="form-group">
                            <label for="TeacherAddress">Address :</label>
                            <input type="text" name="TxtAddress" class="form-control" id="TxtAddress" placeholder="Your Address">
                        </div>
                        <div class="form-group">
                            <label for="TeacherPhone">Phone :</label>
                            <input type="text" name="TxtPhone" class="form-control" id="TxtPhone" placeholder="Your Phone">
                        </div>
                        <div class="form-group">
                            <label for="TeacherPhone">Email :</label>
                            <input type="text" name="TxtEmail" class="form-control" id="TxtEmail" placeholder="Your Phone">
                        </div>
                        <div class="form-group">
                            <label for="TeacherPosition">Position :</label>
                            <input type="text" name="TxtPosition" class="form-control" id="TxtPosition" placeholder="Your Position">
                        </div>
                        <div class="form-group">
                            <label for="TeacherPosition">Select Image :</label>
                            <input type="file" name="fileImage" class="form-control" id="fileImage" >
                        </div>

                    </div> --}}

                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="TeacherFirstName">First Name :</label>
                                    <input type="text" name="TxtFirstname" class="form-control" id="TxtFirstname" placeholder="Enter First Name">
                                </div>
                                <div class="form-group">
                                    <label for="TeacherLastName">Last Name :</label>
                                    <input type="text" name="TxtLastname" class="form-control" id="TxtLastname" placeholder="Enter Last Name">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender :</label>
                                    <input type="text" name="TxtGender" class="form-control" id="TxtGender" placeholder="Your Gender">
                                </div>
                                <div class="form-group">
                                    <label for="TeacherDOB">Date Of Birth :</label>
                                    <input type="text" name="TxtDob" class="form-control" id="TxtDob" placeholder="Your Date of Birth">
                                </div>
                                <div class="form-group">
                                    <label for="TeacherDOB">Select Image :</label>
                                    <input type="text" name="TxtImage" class="form-control" id="TxtImage">
                                </div>
                            </div>

                            <div class="col">

                                <div class="form-group">
                                    <label for="TeacherPhone">Phone :</label>
                                    <input type="text" name="TxtPhone" class="form-control" id="TxtPhone" placeholder="Your Phone">
                                </div>
                                <div class="form-group">
                                    <label for="TeacherPhone">Email :</label>
                                    <input type="text" name="TxtEmail" class="form-control" id="TxtEmail" placeholder="Your Phone">
                                </div>
                                <div class="form-group">
                                    <label for="TeacherPosition">Position :</label>
                                    <input type="text" name="TxtPosition" class="form-control" id="TxtPosition" placeholder="Your Position">
                                </div>
                                <div class="form-group">
                                    <label for="TeacherAddress">Place of Birth :</label>
                                    <textarea class="form-control" name="TxtPob" id="Txt" rows="4"></textarea>
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
