@extends('Admin.layout')
@section('head')
  Competitions
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
            <h3 class="card-title"> All Competitions </h3>

            <div class="card-tools">
              <div class="card-tools">
                <a href="{{ url('/dashboard/competitions/create') }}" class="btn btn-primary btn-sm"
                  title="Add new Competition">Add new</a>
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
                <th>Started</th>
                <th>Expired </th>
                <th>Active</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($competitions as $comp)

                <tr>
                  <td> {{ $loop->iteration }} </td>



                  <td> {{ $comp->name('en') }} </td>
                  <td> {{ $comp->name('ar') }} </td>

                  <td> {{ $comp->started_at }} </td>
                  <td> {{ $comp->expired_at }} </td>

                  <td>
                    @if ($comp->active == 1)
                      <span class="badge badge-success">Active</span>
                    @else
                      <span class="badge badge-danger">Dactive</span>
                    @endif
                  </td>


                  <td>
                    <a class="btn btn-sm btn-info" href=" {{ url("/dashboard/competitions/show/{$comp->id}") }} "
                      title="Show Competition">
                      <i class="fas fa-eye"></i>
                    </a>

                    <a class="btn btn-sm btn-warning" href=" {{ url("/dashboard/competitions/edit/{$comp->id}") }} "
                      title="Edit Competition">
                      <i class="fas fa-edit"></i>
                    </a>

                    <a class="btn btn-sm btn-danger delete" href=" {{ url("/dashboard/competitions/delete/{$comp->id}") }} "
                      title="Delete Competition"  onclick="return confirm('Are you sure?')">
                      <i class="fas fa-trash"></i>
                    </a>

                    <a class="btn btn-sm btn-secondary"
                      href=" {{ url("/dashboard/competitions/toggle/{$comp->id}") }} " title="Open or Closed status">
                      <i class="fas fa-toggle-on"></i>
                    </a>

                  </td>


                </tr>
              @endforeach
            </tbody>
          </table>

          <div class="d-flex justify-content-center py-2 my-2">
            {{ $competitions->links() }}
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
