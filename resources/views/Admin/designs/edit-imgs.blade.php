@extends('Admin.layout')


@section('head')
  Edit Image
@endsection


@section('content')

  <div class="col">
    <form method="post" action="{{ url("/dashboard/designs/sub-imgs-update/{$design->id}/{$designimg->id}") }} "
      enctype="multipart/form-data">
      @csrf

      <div class="row">
        <div class="col">
            <div>
                <img src="{{asset("uploads/$designimg->img")}}" alt="">
            </div>
        </div>
      </div>

      <div class="row my-3">
        {{-- <div class="col">
          <input  type="file" class="form-control" name="img" placeholder="address">
        </div> --}}

        <div class="col">
            <div class="form-group">
              <label for="exampleInputFile">Upload Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="img" >
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
              </div>
            </div>
          </div>
      </div>

      <div class="row my-3">
        <div class="col">
          <a class="btn btn-primary" href=" {{ url()->previous() }} ">
            Back
          </a>
        </div>

        <div class="col">
          <input type="submit" class="btn btn-secondary float-right" value="Update">
        </div>
      </div>

    </form>
  </div>

@endsection
