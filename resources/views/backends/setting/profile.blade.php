@extends('backends.layouts.app')
@section('page_title', 'Profile Page')

@section('content')

<div class="content-wrapper" style="min-height: 2080.12px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Change Profile</h1>

          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active">Change Profile Card</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Welcome : {{ auth()->user()->name }}</h3>

            </div>
            {{-- <a href="#" type="button" class="btn btn-block btn-success float-right">Back</a> --}}

            <!-- /.card-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" method="post"  action="{{ route('admin.profile.update')}}">
                @csrf @method('put')
              <div class="card-body">

                <div class="form-group flex flex-col space-y-2">
                    <label for="name" class="text-gray-700 select-none font-medium">User Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name',$user->name) }}"
                    placeholder="Enter name" class="form-control px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>

                <div class="form-group flex flex-col space-y-2">
                    <label for="email" class="text-gray-700 select-none font-medium">Email</label>
                    <input id="email" type="text" name="email" value="{{ old('email',$user->email) }}"
                    placeholder="Enter email" class="form-control px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>

                <div class="row">
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

                            <img id="showImage" src="{{ (!empty($ut->photo)) ? asset('storage/uploads/'.$ut->photo) : asset('storage/uploads/default-photo.png') }}" alt="" srcset="" width="100" height="auto">

                        </div>
                    </div>
                </div>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </section>


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
