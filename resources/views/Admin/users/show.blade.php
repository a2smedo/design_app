@extends('Admin.layout')


@section('head')
  {{ $user->name }}
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
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">User details</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-sm">

              <tbody>
                <tr>
                  <th>Name</th>
                  <td>
                    {{ $user->name }}
                  </td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>
                    {{ $user->email }}
                  </td>
                </tr>
                <tr>
                  <th>Phone</th>
                  <td>
                    {{ $user->phone }}
                  </td>
                </tr>
                <tr>
                  <th>Type</th>

                  <td>
                    @if ($user->type == 'paid')
                      <span class="badge badge-success">Paid </span>
                    @else
                      <span class="badge badge-danger">Free</span>
                    @endif
                  </td>
                </tr>

                <tr>
                  <th>Package</th>

                  <td>
                    @if ($user->package_id == 1)
                      <span class="badge text-white text-capitalize"
                        style="background-color: #cd7f32 !important">{{ $user->package_name() }}</span>

                    @elseif($user->package_id == 2)
                      <span class="badge text-dark text-capitalize"
                        style="background-color: #C0C0C0 !important">{{ $user->package_name() }}</span>

                    @elseif($user->package_id == 3)
                      <span class="badge text-dark text-capitalize"
                        style="background-color: #ffd700 !important">{{ $user->package_name() }}</span>
                    @else
                      <span class="badge text-dark text-capitalize"
                        style="background-color: #E5E4E2 !important">{{ $user->package_name() }}</span>
                    @endif
                  </td>
                </tr>



                <tr>
                  <th>Status</th>

                  <td>
                    @if ($user->status)
                      <span class="badge badge-success">Verified</span>
                    @else
                      <span class="badge badge-danger">Not Verified</span>
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

    <div class="row my-3">
      <div class="col">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> All Orders </h3>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Design Name</th>
                <th>Design ID</th>
                <th>Design Like </th>
                <th>Order Type </th>
                <th>Order Lang </th>
                <th>Order Color </th>
                <th>Order Status </th>


              </tr>
            </thead>
            <tbody>
              @forelse ($orders as $order)

                <tr id="tr">
                  <td> {{ $loop->iteration }} </td>
                  <td>{{ $order->design_name }} </td>

                  <td>{{ $order->design->id }} </td>

                  <td>
                    <a class="text-dark" href=" {{ url("/dashboard/designs/show/{$order->design->id}") }} ">
                      {{ $order->design->name('en') }} || {{ $order->design->name('ar') }}
                    </a>
                  </td>

                  <td>
                    @if ($order->design_type == 'ready')
                      <span class="badge badge-warning"> {{ $order->design_type }}</span>

                    @else
                      <span class="badge badge-success"> {{ $order->design_type }}</span>

                    @endif
                  </td>

                  <td>{{ $order->lang }}</td>

                  <td>{{ $order->design->color('en') }} || {{ $order->design->color('ar') }} </td>

                  <td>
                    @if ($order->status == 'pending')
                      <span class="badge badge-warning"> {{ $order->status }}</span>

                    @elseif($order->status == 'accepted')
                      <span class="badge badge-secondary"> {{ $order->status }}</span>

                    @elseif($order->status == 'completed')
                      <span class="badge badge-success"> {{ $order->status }}</span>

                    @else
                      <span class="badge badge-danger"> {{ $order->status }}</span>

                    @endif
                  </td>


                </tr>
              @empty
                <p> No Orders found </p>
              @endforelse
            </tbody>
          </table>
        </div>


      </div>
    </div>





    <div class="row my-3">
      <div class="col text-right">
        <a class="btn  btn-primary" href=" {{ url()->previous() }} ">
          Back
        </a>
      </div>
    </div>
  </div>

@endsection
