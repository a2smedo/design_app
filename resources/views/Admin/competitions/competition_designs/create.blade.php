@extends('Admin.layout')


@section('head')
  Create Competition Desgin
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

        <form method="POST" action="{{ url("dashboard/competitions/store/designs/{$competition->id}") }}"
          enctype="multipart/form-data">
          @csrf

          {{-- name(en&&ar) --}}
          <div class="row">


            <div class="col">
              <div class="form-group">
                <label for="name">Design Name (En) </label>
                <input type="text" class="form-control" name="nameEn" required minlength="2" maxlength="100">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="name" class="float-right">(ع) أسم التصميم </label>
                <input type="text" class="form-control text-right" name="nameAr" required minlength="2" maxlength="100">
              </div>
            </div>
          </div>

          <div class="row my-3">


            <div class="col">
              <div class="form-group">
                <label for="exampleInputFile">Design Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="img" required accept="image/*">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- desc(en&&ar) --}}
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="name">Desgin Description (En)</label>
                <textarea name="descEn" class="form-control" rows="3" required minlength="2" maxlength="5000"></textarea>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label class="float-right" for="name">(ع) وصف التصميم </label>
                <textarea name="descAr" class="form-control text-right" rows="3" required minlength="2" maxlength="5000"></textarea>
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



@endsection
