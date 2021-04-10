@extends('admin.layout')
@section('title')
  Show Order
@endsection

@section('head')
  Order Details
@endsection
@section('li')
  <a href="{{ url('/dashboard/orders/show/' . $order->id) }}">Order</a>
@endsection

@section('content')

  <div class="col py-2">

    {{-- <div class="row">
      <div class="col">
        @if (session('add'))
          <div class="alert alert-success" role="alert">
            {{ session('add') }}
          </div>
        @endif

        @if (session('update'))
          <div class="alert alert-info" role="alert">
            {{ session('update') }}
          </div>
        @endif

        @if (session('deleted'))
          <div class="alert alert-warning" role="alert">
            {{ session('deleted') }}
          </div>
        @endif

        @if (session('no-deleted'))
          <div class="alert alert-danger" role="alert">
            {{ session('no-deleted') }}
          </div>
        @endif
      </div>
    </div> --}}

    <div class="row">
      <div class="col">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Order Information </h3>
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-6">
                <p>User Name : {{ $order->user->name }} </p>
                <p>Email : {{ $order->user->email }} </p>

                <p>Date : {{ Carbon\Carbon::parse($order->created_at)->format('d M Y - h:i:s A ') }} </p>

                <p>Design Name: {{ $order->design_name }}</p>

                <p>Design Number: {{ $order->design->id }}</p>

                <p>Design Like : {{ $order->design->name('en') }} || {{ $order->design->name('ar') }} </p>

                <p>Order Type : {{ $order->design_type }}</p>
                <p>Order Lang : {{ $order->lang }}</p>

                <p>Design Color : {{ $order->design->color('en') }} || {{ $order->design->color('ar') }} </p>

                <p>Design Color : {{ $order->design->font('en') }} || {{ $order->design->font('ar') }} </p>

              </div>

              <div class="col">

                <p>
                <p>Background:</p>
                <img style="height: 100px" src="{{ asset("uploads/{$order->design->background}") }}" alt="">
                </p>



                <p>Order Details : {{ $order->details }} </p>

                <p>Order Status :
                  @if ($order->status == 'pending')
                    <span class="badge badge-warning"> {{ $order->status }}</span>

                  @elseif($order->status == 'accepted')
                    <span class="badge badge-secondary"> {{ $order->status }}</span>

                  @elseif($order->status == 'completed')
                    <span class="badge badge-success"> {{ $order->status }}</span>

                  @else
                    <span class="badge badge-danger"> {{ $order->status }}</span>

                  @endif
                </p>

                <p>Price : {{ $order->design->price }} EGP</p>
                <p>Discount : {{ $order->design->discount }} %</p>

                <p>
                  @php

                    $price = $order->design->price;
                    $discount = ($price * $order->design->discount) / 100;

                    $total = $price - $discount;
                  @endphp

                  Total : {{ number_format($total, '2') }} EGP
                </p>

                <p>


                  @if ($order->status == 'pending')

                    <a href="{{ url("/dashboard/orders/accepted/{$order->id}") }}" class="btn btn-sm btn-primary" title="Accepted this Order">
                      Accepted </a>

                    <a href="{{ url("/dashboard/orders/canceled/{$order->id}") }}" class="btn btn-sm btn-danger"
                      id="cancel" title="Canceled this Order">
                      Cancel
                      <i class="fas fa-times"></i>
                    </a>
                  @endif

                  @if ($order->status == 'accepted')
                    <a href="{{ url("/dashboard/orders/completed/{$order->id}") }}" class="btn btn-sm btn-success" title="Completed this Order">
                      Completed </a>
                  @endif

                  @if ($order->status == 'completed')
                    <div class="text-muted"> This order has been completed. </div>
                  @endif

                  @if ($order->status == 'canceled')
                    <div class="text-muted"> This order has been canceled. </div>
                  @endif

                </p>
              </div>
            </div>



          </div>
        </div>






        {{-- <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Unite Price</th>
                <th>Discount</th>
                <th>Quantity </th>
                <th>Total for Product</th>


              </tr>
            </thead>
            <tbody>
              @foreach ($order as $row)


                <tr>
                  <td> {{ $loop->iteration }} </td>
                  <td> {{ $row->id }} </td>
                  <td> {{ $row->name('en') }} </td>
                  <td> {{ $row->pivot->unite_price }} </td>
                  <td> {{ $row->discount }}% </td>
                  <td> {{ $row->pivot->quantity_orderd }} </td>
                  <td> {{ $row->pivot->total_price }} </td>
                   <td> {{ $row->pivot->created_at }} </td>

                </tr>


              @endforeach

              <tr>
                <td colspan="6"></td>
                <td colspan=""> Total : {{ $total['0']->total }} $</td>
              </tr>

               <tr>
                <td colspan="6">
                    <a href=""  class="text-dark" >
                        <i class="fas fa-print"></i>
                        Print
                    </a>
                </td>

                <td>
                  <a href="{{ url("/dashboard/orders/approved/{$order->id}") }}" class="btn btn-sm btn-primary">
                    Approved </a>

                  <a href="{{ url("/dashboard/orders/canceled/{$order->id}") }}" class="btn btn-sm btn-danger"
                    id="cancel">
                    Cancel
                    <i class="fas fa-times"></i>
                  </a>
                  <a href="" class="btn btn-warning"> Print </a>
                </td>
              </tr>

            </tbody>
          </table>


        </div> --}}


      </div>
    </div>
  </div>



@endsection
