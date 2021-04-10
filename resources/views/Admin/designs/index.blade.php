@extends('Admin.layout')


@section('head')
  Designs
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
            <h3 class="card-title"> All Desgins </h3>

            <div class="card-tools">
              <div class="card-tools">
                <a href="{{ url('/dashboard/designs/create') }}" class="btn btn-primary btn-sm" title="Add new Design">Add new</a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Name (en) </th>
                <th>Slider</th>
                <th>Main Image</th>
                <th>Price</th>
                <th>Active</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($designs as $design)

                <tr>
                  <td> {{ $loop->iteration }} </td>

                  <td> {{ $design->cat->name('en') }} </td>

                  <td> {{ $design->name('en') }} </td>

                  {{-- <td> {{ $design->slider }} </td> --}}

                  <td>
                    @if ($design->slider == 'used')
                      <span class="badge badge-primary">Used</span>
                    @else
                      <span class="badge badge-warning">Un used</span>
                    @endif
                  </td>



                  <td> <img src="{{ asset("uploads/$design->main_img") }} " alt="" style="height:30px;"></td>

                  <td> {{ $design->price }} </td>

                  <td>
                    @if ($design->active == 1)
                      <span class="badge badge-success">Active</span>
                    @else
                      <span class="badge badge-danger">Dactive</span>
                    @endif
                  </td>


                  <td>
                    <a class="btn btn-sm btn-info" href=" {{ url("/dashboard/designs/show/{$design->id}") }} " title="Show Design">
                      <i class="fas fa-eye"></i>
                    </a>

                    <a class="btn btn-sm btn-warning" href=" {{ url("/dashboard/designs/edit/{$design->id}") }} " title="Edit Design">
                      <i class="fas fa-edit"></i>
                    </a>

                    <a class="btn btn-sm btn-danger" href=" {{ url("/dashboard/designs/delete/{$design->id}") }} " title="Delete Design" onclick="return confirm('Are you sure?')">
                      <i class="fas fa-trash"></i>
                    </a>

                    <a class="btn btn-sm btn-secondary" href=" {{ url("/dashboard/designs/toggle/{$design->id}") }} " title="Open or Colsed Status">
                      <i class="fas fa-toggle-on"></i>
                    </a>

                    <a class="btn btn-sm btn-info" href=" {{ url("/dashboard/designs/slider/{$design->id}") }} " title="Make this Design Slider">
                        <i class="fas fa-sliders-h"></i>
                    </a>

                  </td>


                </tr>
              @endforeach
            </tbody>
          </table>

          <div class="d-flex justify-content-center py-2 my-2">
            {{ $designs->links() }}
          </div>
        </div>
      </div>


    </div>

  </div>


@endsection
