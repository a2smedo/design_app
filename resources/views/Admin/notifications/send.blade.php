@extends('Admin.layout')


@section('head')
  Notification
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


    <div class="row mt-3">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> Send Notification </h3>
          </div>
        </div>
        <div class="card-body p-0">

          <form action="{{ url('/dashboard/notifications/send') }}" method="post">
            @csrf


            <div class="form-group">
              <div class="form-group">
                <label> Users </label>
                <select class="custom-select form-control" name="users[]" required multiple>
                  <option disabled selected value="">Choose Users </option>
                  @foreach ($users as $user)
                    <option value="{{ $user->id }}"> {{ $user->name }} </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="body">Message</label>
              <textarea id="body" class="form-control" name="message" rows="3" required minlength="2" maxlength="5000"
                placeholder="Message"></textarea>
            </div>

            <div class="row pb-3">
              <div class="col">
                <a class="btn btn-primary" href=" {{ url()->previous() }} ">
                  Back
                </a>
              </div>
              <div class="col text-right">
                <button type="submit" class="btn btn-success"> Send </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        @include('Admin.inc.errors')
      </div>
    </div>



  </div>

@endsection
