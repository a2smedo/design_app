@extends('Admin.layout')


@section('head')
  Users
@endsection

@section('content')



  <div class="col py-2">

    <div class="row">
      <div class="col">
        @if (session('msgAdd'))
          <div class="alert alert-success" role="alert">
            {{ session('msgAdd') }}
          </div>
        @endif

        @if (session('msgUpdate'))
          <div class="alert alert-info" role="alert">
            {{ session('msgUpdate') }}
          </div>
        @endif

        @if (session('msgDeleted'))
          <div class="alert alert-warning" role="alert">
            {{ session('msgDeleted') }}
          </div>
        @endif

        @if (session('msgNoDeleted'))
          <div class="alert alert-danger" role="alert">
            {{ session('msgNoDeleted') }}
          </div>
        @endif
      </div>
    </div>

    <div class="row">
      <div class="col">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> All Users </h3>
          </div>
        </div>

        @if ( $users->isEmpty() )
            <div></div>
        @else
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name </th>
                <th>Email</th>
                <th>Phone</th>
                <th>Type</th>
                <th>Verified</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)

                <tr>
                  <td> {{ $loop->iteration }} </td>
                  <td> {{ $user->name }} </td>
                  <td> {{ $user->email }} </td>
                  <td> {{ $user->phone }} </td>


                  <td>
                    @if ($user->type == "paid" )
                      <span class="badge badge-success">Paid</span>
                    @else
                      <span class="badge badge-danger">Free</span>
                    @endif
                  </td>

                  <td>
                    @if ($user->status )
                      <span class="badge badge-success">Verified</span>
                    @else
                      <span class="badge badge-danger">Not Verified</span>
                    @endif
                  </td>

                  <td>
                    <a class="btn btn-sm btn-danger" href=" {{ url("/dashboard/users/delete/$user->id") }} " title="Delete User " onclick="return confirm('Are you sure?')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <div class="d-flex justify-content-center py-2 my-2">
            {{ $users->links() }}
          </div>
        </div>
        @endif




      </div>


    </div>

  </div>

@endsection
