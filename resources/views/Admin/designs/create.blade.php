@extends('Admin.layout')


@section('head')
  Create Design
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

            <form method="POST" action="{{ url('dashboard/designs/store') }}" enctype="multipart/form-data">
              @csrf

              {{-- cat // name(en&&ar) --}}
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label> Category </label>
                    <select class="custom-select form-control" name="cat_id">
                      <option disabled>Choese Category </option>
                      @foreach ($cats as $cat)
                        <option value="{{ $cat->id }}"> {{ $cat->name('en') }} </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label for="name">Design Name </label>
                    <input type="text" class="form-control" name="nameEn">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="name" class="float-right"> أسم التصميم </label>
                    <input type="text" class="form-control text-right" name="nameAr">
                  </div>
                </div>
              </div>

              {{-- main img && background --}}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputFile">Main Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="main_img">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputFile">Background Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="background">
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
                    <label for="name">Design Description </label>
                    <textarea name="descEn" class="form-control" rows="3"></textarea>
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label class="float-right" for="name"> وصف التصميم </label>
                    <textarea name="descAr" class="form-control text-right" rows="3"></textarea>
                  </div>
                </div>
              </div>

              {{-- price && discount && lang(en&&ar) --}}
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="name"> Price </label>
                    <input type="number" name="price" class="form-control" id="" min="3" step=".01">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="name"> Discount </label>
                    <input type="number" name="discount" class="form-control" id=""  min="1" step=".01">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="name"> Lang </label>
                    <input type="text" name="langEn" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="name" class="float-right"> اللغة </label>
                    <input type="text" name="langAr" class="form-control text-right">
                  </div>
                </div>
              </div>

              {{-- Font(en&&ar) // color(en&&ar) --}}
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="name"> Font </label>
                    <input type="text" name="fontEn" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="name" class="float-right"> الخط </label>
                    <input type="text" name="fontAr" class="form-control text-right">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="name"> Color </label>
                    <input type="text" name="colorEn" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="name" class="float-right"> اللون </label>
                    <input type="text" name="colorAr" class="form-control text-right">
                  </div>
                </div>
              </div>

              {{-- details(en&&ar) --}}
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="name">Design Details </label>
                    <textarea name="detailsEn" class="form-control" rows="3"></textarea>
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label class="float-right" for="name"> معلومات التصميم </label>
                    <textarea name="detailsAr" class="form-control text-right" rows="3"></textarea>
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
