@extends('Admin.layout')


@section('head')
  Add Images
@endsection


@section('content')


  <div class="col">

    <div class="row">
      <div class="col">
        @if (session('imgAdd'))
          <div class="alert alert-success" role="alert">
            {{ session('imgAdd') }}
          </div>
        @endif
      </div>
    </div>


    <div class="row">
        <div class="col">
            <form method="post" action="{{ url("/dashboard/designs/sub-imgs-store/{$design->id}") }} "
              enctype="multipart/form-data">
              @csrf
              <div class="row my-3">
                {{-- <div class="col">
                  <input required type="file" class="form-control" name="imgs[]" placeholder="address" multiple>
                </div> --}}

                <div class="col">
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="imgs[]" multiple >
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
                  <input type="submit" class="btn btn-success float-right" value="save">
                </div>
              </div>

            </form>
        </div>
    </div>



  </div>

@endsection
