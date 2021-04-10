@extends('Admin.layout')


@section('head')
  {{ $design->name('en') . '||' . $design->name('ar') }}
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
            <h3 class="card-title">Design details</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-sm">

              <tbody>


                <tr>
                  <th>Category Name</th>
                  <td>
                    {{ $design->cat->name('en') }}
                  </td>
                </tr>

                <tr>
                  <th>Design Type</th>
                  @if ($design->type != 0)
                  <td>Paid</td>
                  @else
                  <td>Free</td>
                  @endif
                </tr>
                <tr>
                  <th>Name (en)</th>
                  <td>
                    {{ $design->name('en') }}
                  </td>
                </tr>
                <tr>
                  <th>Name (ar)</th>
                  <td>
                    {{ $design->name('ar') }}
                  </td>
                </tr>

                <tr>
                  <th>Slider</th>
                  <td>
                    {{ $design->slider }}
                  </td>
                </tr>

                <tr>
                  <th>Main Image</th>
                  <td>
                    <img src="{{ asset("uploads/designs/design.jpg") }}" alt="" style="height: 50px">
                  </td>
                </tr>
                <tr>
                  <th>Description (en)</th>
                  <td>
                    {{ $design->desc('en') }}
                  </td>
                </tr>
                <tr>
                  <th>Description (ar)</th>
                  <td>
                    {{ $design->desc('ar') }}
                  </td>
                </tr>

                <tr>
                  <th>Price</th>
                  <td>
                    {{ $design->price }}
                  </td>
                </tr>
                <tr>
                  <th>Discount</th>
                  <td>
                    {{ $design->discount }}
                  </td>
                </tr>
                <tr>
                  <th>Language</th>
                  <td>
                    <span> En :   {{ $design->lang("en") }} </span>
                    <span>||</span>
                    <span> Ar :   {{ $design->lang("ar") }} </span>
                  </td>
                </tr>

                <tr>
                  <th>Background</th>
                  <td>
                    <img src="{{ asset("uploads/$design->background") }}" alt="" height="50px">
                  </td>
                </tr>

                <tr>
                  <th>Font</th>
                  <td>
                    <span>En: {{ $design->font('en') }}</span>
                    <span>||</span>
                    <span>Ar: {{ $design->font('ar') }}</span>
                  </td>
                </tr>
                <tr>
                  <th>Color</th>
                  <td>
                   <span>En: {{ $design->color('en') }}</span>
                   <span>||</span>
                   <span>AR: {{ $design->color('ar') }}</span>
                  </td>
                </tr>

                <tr>
                  <th>Details(en)</th>
                  <td>
                    {{ $design->details('en') }}
                  </td>
                </tr>
                <tr>
                  <th>Details(ar)</th>
                  <td>
                    {{ $design->details('ar') }}
                  </td>
                </tr>

                <tr>
                  <th>Rate</th>
                  <td>
                    {{ $design->rate }}
                  </td>
                </tr>

                <tr>
                  <th>Active</th>
                  <td>
                    @if ($design->active)
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
        <a class="btn  btn-success" href=" {{ url("/dashboard/designs/show/sub-images/{$design->id}") }} ">
          Show Design Images
        </a>

        <a class="btn  btn-primary" href=" {{ url()->previous() }} ">
          Back
        </a>
      </div>
    </div>
  </div>

@endsection
