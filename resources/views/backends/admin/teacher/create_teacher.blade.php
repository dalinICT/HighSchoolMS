@extends('backends.layouts.app')
@section('page_title','teacher create')

@section('content')
<div class="content-wrapper">
    <section class="content">
            <div class="container-fluid mt-2 ">
                <div class="row justify-content-center">
                    <div class="col-md-6">

                <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Create Teacher</h3>
                </div>
                <form method="POST" id="quickForm" novalidate="novalidate" action="{{ route('admin.users.store')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                    <div class="form-group">
                        <label for="TeacherFirstName">First Name :</label>
                        <input type="text" name="fistname" class="form-control" id="TeacherFirstName" placeholder="Enter First Name">
                    </div>
                    <div class="form-group">
                        <label for="TeacherLastName">Last Name :</label>
                        <input type="text" name="lastname" class="form-control" id="TeacherLastName" placeholder="Enter Last Name">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender :</label>
                        <input type="text" name="gender" class="form-control" id="TeacherGender" placeholder="Your Gender">
                    </div>
                    <div class="form-group">
                        <label for="TeacherDOB">Date Of Birth :</label>
                        <input type="text" name="TeacherDOB" class="form-control" id="TeacherDOB" placeholder="Your Date of Birth">
                    </div>
                    <div class="form-group">
                        <label for="TeacherAddress">Address :</label>
                        <input type="text" name="TeacherAddress" class="form-control" id="TeacherAddress" placeholder="Your Address">
                    </div>
                    <div class="form-group">
                        <label for="TeacherPhone">Phone :</label>
                        <input type="text" name="TeacherPhone" class="form-control" id="TeacherPhone" placeholder="Your Phone">
                    </div>
                    <div class="form-group">
                        <label for="TeacherPosition">Position :</label>
                        <input type="text" name="TeacherPosition" class="form-control" id="TeacherPosition" placeholder="Your Position">
                    </div>
                    <div class="form-group">
                        <label for="TeacherPhoto">Photo :</label>
                        <input type="file" name="TeacherPhoto" class="form-control" id="TeacherPhoto" >
                    </div>
                    {{-- <div class="form-group mb-0">
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                        <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                        </div>
                    </div> --}}
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    <button type="submit" class="btn btn-danger">Submit</button>
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