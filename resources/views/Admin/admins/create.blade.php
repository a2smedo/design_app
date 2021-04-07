@extends('admin.layout')


@section('head')
  Create new admin
@endsection

@section('content')



  <div class="col">

    <div class="row">
      <div class="col">
        @include('admin.inc.errors')
      </div>
    </div>
    <div class="row">
      <div class="col">

        <form method="POST" action="{{ url('dashboard/admins/store') }}">
          @csrf

          <div class="form-group">
            <label for="name"> Name </label>
            <input type="text" class="form-control" name="name">
          </div>

          <div class="form-group">
            <label for="name"> Email </label>
            <input type="email" class="form-control" name="email">
          </div>

          <div class="form-group">
            <label for="name"> Phone </label>
            <input type="text" class="form-control" name="phone">
          </div>

          <div class="form-group">
            <label for="name"> Password </label>
            <input type="password" class="form-control" name="password">
          </div>
          <div class="form-group">
            <label for="name"> Confirm Password </label>
            <input type="password" class="form-control" name="password_confirmation">
          </div>

          <div class="form-group">
            <label> Rule </label>
            <select class="custom-select form-control" name="rule_id">
              <option disabled>Choese Rule </option>
              @foreach ($rules as $rule)
                <option value="{{ $rule->id }}"> {{ $rule->name }} </option>
              @endforeach
            </select>
          </div>


          <div class="row pb-3">

            <div class="col">
              <a class="btn btn-primary" href=" {{ url()->previous() }} ">
                Back
              </a>
            </div>

            <div class="col text-right">
              <button type="submit" class="btn btn-success"> Save </button>
            </div>
          </div>

        </form>
      </div>
    </div>

  </div>
@endsection
