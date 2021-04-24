@extends('Admin.layout')


@section('head')
  Messages
@endsection

@section('content')



  <div class="col py-2">

    <div class="row">
      <div class="col">
        @if (session('msgSend'))
          <div class="alert alert-success" role="alert">
            {{ session('msgSend') }}
          </div>
        @endif
      </div>
    </div>

    <div class="row">
      <div class="col">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> All Messages </h3>
          </div>
        </div>

        @if ($messages->isEmpty())
        <div>
            <p>No Messages Found</p>
        </div>
        @else
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name </th>
                <th>Email</th>
                <th>Subject</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($messages as $msg)
                <tr>
                  <td> {{ $loop->iteration }} </td>
                  <td> {{ $msg->user->name }} </td>
                  <td> {{ $msg->email }} </td>
                  <td> {{ $msg->subject ?? '...' }} </td>


                  <td>
                    <a class="btn btn-sm btn-info" href=" {{ url("/dashboard/messages/show/$msg->id") }} " title="Show Message">
                      <i class="fas fa-eye"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <div class="d-flex justify-content-center py-2 my-2">
            {{ $messages->links() }}
          </div>
        </div>
        @endif
      </div>


    </div>

  </div>

@endsection
