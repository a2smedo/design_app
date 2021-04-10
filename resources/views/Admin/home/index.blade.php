@extends('Admin.layout')

@section('title')
  Dashboard
@endsection
@section('Css')
  <style>
    ion-icon {
      font-size: 50px;
    }

    th{
        font-size: 15px !important;
    }

  </style>
@endsection

@section('content')

  <div class="col">

    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">


        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $packages_count }} </h3>

              <p>Packages</p>
            </div>
            <div class="icon">


              <i class="ion ion-social-dropbox"></i>
              {{-- <i class="ion ion-pie-graph"></i> --}}
            </div>
            <a href="{{ url('/dashboard/packages') }}" class="small-box-footer">More info <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>{{ $cats_count }}</h3>

              <p>Categories</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-list"></i>
            </div>
            <a href="{{ url('/dashboard/cats') }}" class="small-box-footer">More info <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-olive">
            <div class="inner">
              <h3>{{ $designs_count }}</h3>

              <p>Designs</p>
            </div>
            <div class="icon">
              <i class="ion ion-paintbucket"></i>
            </div>
            <a href="{{ url('/dashboard/designs') }}" class="small-box-footer">More info <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>



        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{ $competitions_count }}</h3>

              <p>Competitions</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ url('/dashboard/competitions') }}" class="small-box-footer">More info <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->

        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $users_count }}</h3>

              <p>Users</p>
            </div>
            <div class="icon">

              <i class="ion ion-person-add"></i>
            </div>
            <a href="javscript:;" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->


        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $orders_count }}</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('/dashboard/orders') }}" class="small-box-footer">More info <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>





      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable ui-sortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Last Designs </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Desgin Name</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Rate</th>
                    <th>Type</th>
                  </tr>
                </thead>


                <tbody>
                  @foreach ($designs as $design)

                    <tr>
                      <td>{{ $loop->iteration }}</td>

                      <td>{{ $design->name('en') }} </td>

                      <td>{{ $design->price }} </td>

                      <td>
                        <span class="badge bg-danger">
                          {{ number_format($design->discount, 2) }}%
                        </span>
                      </td>

                      <td>
                        <span class="badge bg-warning">
                          {{ number_format($design->rate, 2) }}
                        </span>
                      </td>

                      <td>
                        aaa
                      </td>

                    </tr>
                  @endforeach



                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Last Orders </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Type</th>
                    <th>Client Name</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Order</th>
                  </tr>
                </thead>


                <tbody>
                  @foreach ($orders as $order)

                    <tr>
                      <td>{{ $loop->iteration }}</td>

                      <td>
                        @if ($order->design_type == 'ready')
                          <span class="badge bg-gradient-orange">Ready</span>
                        @else
                          <span class="badge bg-gradient-indigo">Request</span>
                        @endif
                      </td>

                      <td>{{ $order->user->name }} </td>

                      <td>

                        <span class="badge bg-gradient-maroon">
                          @php

                            $price = $order->design->price;
                            $discount = ($price * $order->design->discount) / 100;

                            $total = $price - $discount;
                          @endphp

                          {{ number_format($total, '2') }}
                        </span>
                      </td>

                      <td>
                        @if ($order->status == 'pending')
                          <span class="badge badge-warning"> {{ $order->status }}</span>

                        @elseif($order->status == 'accepted')
                          <span class="badge badge-primary"> {{ $order->status }}</span>

                        @elseif($order->status == 'completed')
                          <span class="badge badge-success"> {{ $order->status }}</span>

                        @else
                          <span class="badge badge-danger"> {{ $order->status }}</span>
                        @endif
                      </td>

                      <td>
                         {{ Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}
                      </td>

                    </tr>
                  @endforeach



                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>




        </section>



        <!-- /.Left col -->

        <section class="col-lg-6 connectedSortable ui-sortable">

          <div class="card card-primary card-outline ">
            <div class="card-header">
              <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                Designs
              </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div id="line-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base"
                  style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 443.5px; height: 300px;"
                  width="443" height="300"></canvas><canvas class="flot-overlay" width="443" height="300"
                  style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 443.5px; height: 300px;"></canvas>
                <div class="flot-svg"
                  style="position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; pointer-events: none;"><svg
                    style="width: 100%; height: 100%;">
                    <g class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><text x="37"
                        y="294" class="flot-tick-label tickLabel"
                        style="position: absolute; text-align: center;">0</text><text x="95.44444444444444" y="294"
                        class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">2</text><text
                        x="153.88888888888889" y="294" class="flot-tick-label tickLabel"
                        style="position: absolute; text-align: center;">4</text><text x="212.33333333333331" y="294"
                        class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">6</text><text
                        x="270.77777777777777" y="294" class="flot-tick-label tickLabel"
                        style="position: absolute; text-align: center;">8</text><text x="325.24565972222223" y="294"
                        class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">10</text><text
                        x="383.69010416666663" y="294" class="flot-tick-label tickLabel"
                        style="position: absolute; text-align: center;">12</text></g>
                    <g class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><text x="1"
                        y="269" class="flot-tick-label tickLabel"
                        style="position: absolute; text-align: right;">-1.5</text><text x="1" y="226.66666666666669"
                        class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">-1.0</text><text
                        x="1" y="184.33333333333334" class="flot-tick-label tickLabel"
                        style="position: absolute; text-align: right;">-0.5</text><text x="5.984375" y="15"
                        class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">1.5</text><text
                        x="5.984375" y="142" class="flot-tick-label tickLabel"
                        style="position: absolute; text-align: right;">0.0</text><text x="5.984375" y="99.66666666666667"
                        class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">0.5</text><text
                        x="5.984375" y="57.333333333333336" class="flot-tick-label tickLabel"
                        style="position: absolute; text-align: right;">1.0</text></g>
                  </svg></div>
              </div>
            </div>
            <!-- /.card-body-->
          </div>

          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                orders
              </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div id="line-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base"
                  style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 443.5px; height: 300px;"
                  width="443" height="300"></canvas><canvas class="flot-overlay" width="443" height="300"
                  style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 443.5px; height: 300px;"></canvas>
                <div class="flot-svg"
                  style="position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; pointer-events: none;"><svg
                    style="width: 100%; height: 100%;">
                    <g class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><text x="37"
                        y="294" class="flot-tick-label tickLabel"
                        style="position: absolute; text-align: center;">0</text><text x="95.44444444444444" y="294"
                        class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">2</text><text
                        x="153.88888888888889" y="294" class="flot-tick-label tickLabel"
                        style="position: absolute; text-align: center;">4</text><text x="212.33333333333331" y="294"
                        class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">6</text><text
                        x="270.77777777777777" y="294" class="flot-tick-label tickLabel"
                        style="position: absolute; text-align: center;">8</text><text x="325.24565972222223" y="294"
                        class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">10</text><text
                        x="383.69010416666663" y="294" class="flot-tick-label tickLabel"
                        style="position: absolute; text-align: center;">12</text></g>
                    <g class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><text x="1"
                        y="269" class="flot-tick-label tickLabel"
                        style="position: absolute; text-align: right;">-1.5</text><text x="1" y="226.66666666666669"
                        class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">-1.0</text><text
                        x="1" y="184.33333333333334" class="flot-tick-label tickLabel"
                        style="position: absolute; text-align: right;">-0.5</text><text x="5.984375" y="15"
                        class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">1.5</text><text
                        x="5.984375" y="142" class="flot-tick-label tickLabel"
                        style="position: absolute; text-align: right;">0.0</text><text x="5.984375" y="99.66666666666667"
                        class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">0.5</text><text
                        x="5.984375" y="57.333333333333336" class="flot-tick-label tickLabel"
                        style="position: absolute; text-align: right;">1.0</text></g>
                  </svg></div>
              </div>
            </div>
            <!-- /.card-body-->
          </div>



        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div>


  </div>

@endsection
