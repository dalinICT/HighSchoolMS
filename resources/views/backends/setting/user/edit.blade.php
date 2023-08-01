@extends('backends.layouts.app')
@section('page_title', 'Create User')

@section('content')

<div class="content-wrapper" style="min-height: 2171.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Validation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Validation</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" id="quickForm" novalidate="novalidate" action="{{ route('admin.users.update',$user->id)}}">
                @csrf
                @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputUserName">User Name</label>
                    <input type="text" name="name" value="{{ old('name',$user->name) }}" class="form-control" id="InputUserName" placeholder="Enter User Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" value="{{ old('email',$user->email) }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select User Role</label>
                        <select class="custom-select" name="roles[]" >
                            @foreach($roles as $role)
                                @if(count($user->roles->where('id',$role->id)))
                                    <option value="{{$role->id}}">{{ $role->name }}</option>
                                @endif
                                <option>{{ $role->name }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="d-block">Upload User Photo:</label>
                            <input value="{{ old('profile') }}" accept="image/*" type="file" id="profile" name="profile" class="form-input-styled" data-fouc onchange="previewImage(event)">
                            <span class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>
                            {{-- @error('profile')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                        </div>
                        <div class="form-group">
                            @if($user->profile)

                                <img id="showImage" src="{{ $profileImagePath }}" alt="" srcset="" width="100" height="auto">
                            @else
                                <img id="showImage" src="{{ asset('storage/no-picture-taking.png') }}" alt="" srcset="" width="100" height="auto">
                            @endif
                        </div>
                    </div>
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
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script type="text/javascript">
    function previewImage(event) {
       var input = event.target;
       var reader = new FileReader();

       reader.onload = function(){
           var dataURL = reader.result;
           var image = document.getElementById('showImage');
           image.src = dataURL;
       };

       reader.readAsDataURL(input.files[0]);
   }
</script>





@endsection




