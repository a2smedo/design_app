@extends('Admin.layout')
@section('title')
  Notifications
@endsection

@section('head')
  Notifications
@endsection

@section('li')
  <a href="{{ url('/dashboard/orders') }}">Orders</a>
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
            <h3 class="card-title"> All Notifications </h3>
          </div>
        </div>



        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Message</th>
                <th>Type </th>
                <th>Notifications Date </th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($notifications as $notific)

                <tr id="tr">
                  <td> {{ $loop->iteration }} </td>

                  <td> {{ $notific->title }} </td>
                  <td> {{ $notific->message }} </td>
                  <td>
                    @if ($notific->type == 'order')
                      <span class="badge badge-success"> {{ $notific->type }}</span>
                    @else
                      <span class="badge badge-warning"> {{ $notific->type }}</span>
                    @endif

                  </td>
                  <td> {{ $notific->created_at }} </td>


                  <td>
                    <a class="btn btn-sm btn-danger" href=" {{ url("/dashboard/notifications/delete/{$notific->id}") }} " title="Delete Notification" onclick="return confirm('Are you sure?')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              @empty
                <p> No Notifications found </p>
              @endforelse
            </tbody>
          </table>

          <div class="d-flex justify-content-center py-2 my-2">
            {{ $notifications->links() }}
          </div>
        </div>


      </div>
    </div>


  </div>



@endsection

@section('Script')

<script>


</script>

@endsection
