@extends('backends.layouts.app')
@section('page_title', 'View User')

@section('content')

<div class="content-wrapper" style="min-height: 2080.12px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1>Simple Tables</h1>

          </div>
          <div class="col-sm-3">
            @can('User create')
            <a href="{{route('admin.users.create')}}" type="button" class="btn btn-block btn-success">Add New User</a>
            @endcan

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">Number</th>
                      <th>User Name</th>
                      <th>Role</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @can('User access')
                      @foreach($users as $num => $user)
                    <tr>
                      <td>{{ $num+1 }}</td>
                      <td>{{ $user->name }}</td>


                      <td>
                        @foreach($user->roles as $role)
                        <span class="badge bg-success">{{ $role->name }}</span>
                        @endforeach
                    </td>

                      <td class="py-4 px-6 border-b border-grey-light text-right">
                        @can('User edit')
                        <a href="{{route('admin.users.edit',$user->id)}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                        @endcan

                        @can('User delete')

                        {{-- <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline"> --}}
                            {{-- @csrf --}}
                            {{-- @method('delete') --}}
                            <a href="{{route('admin.users.destroy', $user->id)}}"   class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400" id="delete">Delete</a>
                            {{-- <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400" id="delete" >Delete</button> --}}
                        {{-- </form> --}}
                        @endcan

                      </td>

                    </tr>

                    @endforeach
                    @endcan
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
