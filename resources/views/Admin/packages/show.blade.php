@extends('Admin.layout')


@section('head')
 {{ $package->name('en') . ' || ' . $package->name('ar') }}
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
            <h3 class="card-title">Package details</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-sm">

              <tbody>

                <tr>
                  <th>Name (en)</th>
                  <td>
                    {{ $package->name('en') }}
                  </td>
                </tr>
                <tr>
                  <th>Name (ar)</th>
                  <td>
                    {{ $package->name('ar') }}
                  </td>
                </tr>
                <tr>
                  <th>Price</th>
                  <td>
                    {{ $package->price }}
                  </td>
                </tr>


                <tr>
                  <th>Description (en)</th>
                  <td>
                    {{ $package->desc('en') }}
                  </td>
                </tr>
                <tr>
                  <th>Description (ar)</th>
                  <td>
                    {{ $package->desc('ar') }}
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
        <a class="btn  btn-primary" href=" {{ url()->previous() }} ">
          Back
        </a>
      </div>
    </div>
  </div>

@endsection
