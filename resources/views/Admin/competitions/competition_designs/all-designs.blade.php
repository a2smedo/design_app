@extends('Admin.layout')

@section('Css')

  {{-- <style>
    .cont{
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

</style> --}}

@endsection

@section('head')
  {{ $competition->name('en') }}_Designs
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
            <h3 class="card-title"> Competition Designs </h3>

            <div class="card-tools">
              <a href="{{ url("/dashboard/competitions/create/designs/$competition->id") }}" class="btn btn-primary btn-sm" title="Add new Design">Add new</a>
            </div>
          </div>
        </div>

        @if ( $competition_designs->isEmpty() )
            <div></div>

        @else
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name (en) </th>
                  <th>Name (ar) </th>
                  <th>Image</th>
                  <th>Rate</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($competition_designs as $comp_d)

                  <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $comp_d->name('en') }} </td>
                    <td> {{ $comp_d->name('ar') }} </td>

                    <td> <img src="{{ asset("uploads/$comp_d->img") }} " alt="" style="height:30px;"></td>

                    <td> {{ $comp_d->rate }} </td>
                    <td>
                      @if ($comp_d->active == 1)
                        <span class="badge badge-success">Active</span>
                      @else
                        <span class="badge badge-danger">Dactive</span>
                      @endif
                    </td>




                    <td>
                      <a class="btn btn-sm btn-info"
                        href=" {{ url("/dashboard/competitions/show/designs/{$competition->id}/{$comp_d->id}") }} " title="Show Design">
                        <i class="fas fa-eye"></i>
                      </a>

                       <a class="btn btn-sm btn-warning" href=" {{ url("/dashboard/competitions/edit/designs/{$competition->id}/{$comp_d->id}") }} " title="Edit Design">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-sm btn-danger" href=" {{ url("/dashboard/competitions/delete/designs/{$comp_d->id}") }} " title="Delete Design" onclick="return confirm('Are you sure?')">
                            <i class="fas fa-trash"></i>
                        </a>

                        <a class="btn btn-sm btn-secondary" href=" {{ url("/dashboard/competitions/toggle/designs/{$comp_d->id}") }} " title="Open or Closed status">
                            <i class="fas fa-toggle-on"></i>
                        </a>

                    </td>


                  </tr>
                @endforeach
              </tbody>
            </table>

            <div class="d-flex justify-content-center py-2 my-2">
              {{ $competition_designs->links() }}
            </div>
          </div>
        @endif

      </div>


    </div>

  </div>

























@endsection
