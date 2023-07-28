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
                    <h3 class="card-title">View Teacher</h3>
                </div>

                {{-- ========================================== --}}
                {{--            View All List Teacher           --}}
                {{-- ========================================== --}}
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-12">
            
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">DataTable list all teachers.</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Place of Birth</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Image</th>
                                </tr>
                              </thead>
                              <?php $i = 1 ?>
                              <tbody>
                                {{-- Loop values throug database table --}}
                                  @foreach ($teachers as $teacher)
                                      <tr>
                                          <td>{{ $i++ }}</td>
                                          <td>{{ $teacher->firstname }}</td>
                                          <td>{{ $teacher->lastname }}</td>
                                          <td>{{ $teacher->gender }}</td>
                                          <td>{{ $teacher->dob }}</td>
                                          <td>{{ $teacher->pob }}</td>
                                          <td>{{ $teacher->phone }}</td>
                                          <td>{{ $teacher->email }}</td>
                                          <td>{{ $teacher->position }}</td>
                                          <td>{{ $teacher->image }}</td>

                                          {{-- <a class="btn btn-warning p-2" href="{{ url('edit/'.$item->id) }}">Edit</a> --}}
                                      </tr>
                                  @endforeach
                              </tbody>

                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
            
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>



                <!-- /.card -->
            </div>
            </div>
            <!-- /.row -->
        </div>
    </section>
</div>


@endsection