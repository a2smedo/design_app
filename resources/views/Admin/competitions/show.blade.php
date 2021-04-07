@extends('Admin.layout')


@section('head')
  {{ $competition->name('en') . '||' . $competition->name('ar') }}
@endsection

@section('content')

  <div class="col">

    <div class="row">
      <div class="col">
        @if (session('msgUpdate'))
          <div class="alert alert-info" role="alert">
            {{ session('msgUpdate') }}
          </div>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 mx-auto">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Competition details</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-sm">

              <tbody>

                <tr>
                  <th>Name (en)</th>
                  <td>
                    {{ $competition->name('en') }}
                  </td>
                </tr>
                <tr>
                  <th>Name (ar)</th>
                  <td>
                    {{ $competition->name('ar') }}
                  </td>
                </tr>


                <tr>
                  <th>Description (en)</th>
                  <td>
                    {{ $competition->desc('en') }}
                  </td>
                </tr>
                <tr>
                  <th>Description (ar)</th>
                  <td>
                    {{ $competition->desc('ar') }}
                  </td>
                </tr>

                <tr>
                  <th>Started at</th>
                  <td>
                    {{ $competition->started_at }}
                  </td>
                </tr>
                <tr>
                  <th>Expired at</th>
                  <td>
                    {{ $competition->expired_at }}
                  </td>
                </tr>



                <tr>
                  <th>Active</th>
                  <td>
                    @if ($competition->active)
                      <span class="badge badge-success">Active</span>
                    @else
                      <span class="badge badge-danger">Deactive</span>
                    @endif
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
    <div class="row pb-3">
      <div class="col-md-10 mx-auto text-right">
        <a class="btn  btn-success" href=" {{ url("/dashboard/competitions/designs/{$competition->id}") }} ">
          Show Competition Designs
        </a>

        <a class="btn  btn-primary" href=" {{ url()->previous() }} ">
          Back
        </a>
      </div>
    </div>
  </div>

@endsection
