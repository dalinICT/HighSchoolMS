@extends('backends.layouts.app')
@section('page_title', 'View Roles')

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
                <div>
{{-- <x-app-layout> --}}
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1">
              <div class="bg-white shadow-md rounded my-6 p-5">
                <form method="POST" action="{{ route('admin.roles.update',$role->id)}}">
                  @csrf
                  @method('put')
                <div class="flex flex-col space-y-2">
                  <label for="role_name" class="text-gray-700 select-none font-medium">Role Name</label>
                  <input
                    id="role_name"
                    type="text"
                    name="name"
                    value="{{ old('name',$role->name) }}"
                    placeholder="Placeholder"
                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                  />
                </div>

                <h3 class="text-xl my-4 text-gray-600">Permissions</h3>
                <div class="grid grid-cols-3 gap-4">
                  @foreach($permissions as $permission)
                      <div class="flex flex-col justify-cente">
                          <div class="flex flex-col">
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="permissions[]" value="{{$permission->id}}"  @if(count($role->permissions->where('id',$permission->id)))
                                      checked
                                    @endif
                                  ><span class="ml-2 text-gray-700">{{ $permission->name }}</span>
                              </label>
                          </div>
                      </div>
                  @endforeach
                </div>
                <div class="text-center mt-16">
                  <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Update</button>
                </div>
              </div>


            </div>
        </main>
    </div>
</div>
{{-- </x-app-layout> --}}
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
@endsection
