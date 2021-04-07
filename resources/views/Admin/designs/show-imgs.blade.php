@extends('Admin.layout')

@section('Css')

  <style>
    .cont {
      position: relative;
      overflow: hidden;
    }

    .overlay {
      background-color: rgba(26, 25, 25, 0.144) !important;
      position: absolute;
      top: 110%;
      left: 0;
      right: 0;
      bottom: 0;
      z-index: 20;
      display: flex;
      align-items: center;
      justify-content: space-around !important;
      transition: all .5s ease-in-out;
    }

    .cont:hover .overlay {
      top: 0;
    }

  </style>

@endsection

@section('head')
  {{ $design->name('en') }}_Images
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
            <h3 class="card-title"> All Desgin images </h3>

            <div class="card-tools">
              <div class="card-tools">
                <a href="{{url("dashboard/designs/sub-imgs-create/{$design->id}")}}" class="btn btn-primary">Add new image</a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Active</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($design_images as $d_img)

                <tr>
                  <td> {{ $loop->iteration }} </td>



                  <td> <img src="{{ asset("uploads/$d_img->img") }} " alt="" style="height:100px;"></td>

                  <td>
                    @if ($d_img->active == 1)
                      <span class="badge badge-success">Active</span>
                    @else
                      <span class="badge badge-danger">Dactive</span>
                    @endif
                  </td>


                  <td>

                    <a class="btn btn-sm btn-warning"
                      href=" {{ url("/dashboard/designs/sub-imgs-edit/{$design->id}/{$d_img->id}") }} ">
                      <i class="fas fa-edit"></i>
                    </a>

                    <a class="btn btn-sm btn-danger"
                      href=" {{ url("/dashboard/designs/sub-imgs-delete/{$design->id}/{$d_img->id}") }} ">
                      <i class="fas fa-trash"></i>
                    </a>

                    <a class="btn btn-sm btn-secondary" href=" {{ url("/dashboard/designs/sub-imgs-toggle/{$design->id}/{$d_img->id}") }} ">
                        <i class="fas fa-toggle-on"></i>
                      </a>

                  </td>


                </tr>
              @endforeach
            </tbody>
          </table>

          <div class="d-flex justify-content-center py-2 my-2">
            {{ $design_images->links() }}
          </div>
        </div>
      </div>


    </div>

  </div>


@endsection
