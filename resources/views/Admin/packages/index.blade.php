@extends('Admin.layout')


@section('head')
  Packages
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
            <h3 class="card-title"> All Packages </h3>

            <div class="card-tools">
              <div class="card-tools">
                <a href="{{ url('/dashboard/packages/create') }}" class="btn btn-primary btn-sm" title="Add new Package">Add new</a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name (en) </th>
                <th>Name (ar) </th>
                <th>Price</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($packages as $package)

                <tr>
                  <td> {{ $loop->iteration }} </td>



                  <td> {{ $package->name('en') }} </td>
                  <td> {{ $package->name('ar') }} </td>


                  <td> {{ $package->price }} </td>


                  <td>
                    <a class="btn btn-sm btn-info" href=" {{ url("/dashboard/packages/show/{$package->id}") }} " title="Show Package">
                      <i class="fas fa-eye"></i>
                    </a>

                    <a class="btn btn-sm btn-warning" href=" {{ url("/dashboard/packages/edit/{$package->id}") }} " title="Edit Package">
                      <i class="fas fa-edit"></i>
                    </a>

                    <a class="btn btn-sm btn-danger" href=" {{ url("/dashboard/packages/delete/{$package->id}") }} " title="Delete Package" onclick="return confirm('Are you sure?')">
                      <i class="fas fa-trash"></i>
                    </a>

                  </td>


                </tr>
              @endforeach
            </tbody>
          </table>

          <div class="d-flex justify-content-center py-2 my-2">
            {{ $packages->links() }}
          </div>
        </div>
      </div>


    </div>

  </div>


@endsection
