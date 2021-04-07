@extends('Admin.layout')


@section('head')
  Create Package
@endsection

@section('content')

  <div class="col">

    <div class="row">
      <div class="col">
        @include('Admin.inc.errors')
      </div>
    </div>

    <div class="row">
      <div class="col">

        <form method="POST" action="{{ url('dashboard/packages/store') }}">
          @csrf

          {{-- name(en&&ar) --}}
          <div class="row">


            <div class="col">
              <div class="form-group">
                <label for="name">Package Name </label>
                <input type="text" class="form-control" name="nameEn">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="name" class="float-right"> أسم الباقة </label>
                <input type="text" class="form-control text-right" name="nameAr">
              </div>
            </div>



          </div>

          <div class="row">
            <div class="col">
                <div class="form-group">
                  <label > Price</label>
                  <input type="number" class="form-control" name="price" min="1" step=".01">
                </div>
              </div>
          </div>


          {{-- desc(en&&ar) --}}
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="name">Package Description </label>
                <textarea name="descEn" class="form-control" rows="3"></textarea>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label class="float-right" for="name"> وصف الباقة </label>
                <textarea name="descAr" class="form-control text-right" rows="3"></textarea>
              </div>
            </div>
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


@section('Script')

  <script>
    $(document).ready(function() {

      $(function () {
            $('#started_at, #expired_at').datetimepicker({
                format: 'Y-M-D h:m:s'
            });
        });
    });

  </script>

@endsection
