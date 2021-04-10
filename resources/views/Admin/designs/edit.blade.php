@extends('Admin.layout')


@section('head')
  Edit Design
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

        <form method="POST" action="{{ url("dashboard/designs/update/$design->id") }}" enctype="multipart/form-data">
          @csrf

          {{-- cat // name(en&&ar) --}}
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label> Category </label>
                <select class="custom-select form-control" name="cat_id" required>
                  <option disabled selected value="">Choese Category </option>
                  @foreach ($cats as $cat)
                    <option value="{{ $cat->id }}" @if ($design->cat_id == $cat->id) selected @endif> {{ $cat->name('en') }} && {{ $cat->name('ar') }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label> Design Type </label>
                <select class="custom-select form-control" name="type" required>
                  <option disabled selected value="">Choese Design type </option>

                  <option value="0" @if ($design->type == 0 )
                    selected
                  @endif > Free </option>
                  <option value="1" @if ($design->type == 1 )
                    selected
                  @endif > Paid </option>
                </select>
              </div>
            </div>


          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="name">Design Name (En) </label>
                <input type="text" class="form-control" name="nameEn" value="{{ $design->name('en') }}" required
                  minlength="2" maxlength="100">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="name" class="float-right">(ع) أسم التصميم </label>
                <input type="text" class="form-control text-right" name="nameAr" value="{{ $design->name('ar') }}"
                  required minlength="2" maxlength="100">
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
                    <input type="file" class="custom-file-input" name="main_img" accept="image/*">
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
                    <input type="file" class="custom-file-input" name="background" accept="image/*">
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
                <label for="name">Design Description (En) </label>
                <textarea name="descEn" class="form-control" rows="3" required minlength="2" maxlength="5000">{{ $design->desc('en') }}
                        </textarea>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label class="float-right" for="name">(ع) وصف التصميم </label>
                <textarea name="descAr" class="form-control text-right" rows="3" required minlength="2" maxlength="5000">{{ $design->desc('ar') }}
                        </textarea>
              </div>
            </div>
          </div>

          {{-- price && discount && lang(en&&ar) --}}
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="name"> Price </label>
                <input type="number" name="price" class="form-control" id="" min="1" step=".01"
                  value="{{ $design->price }}" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="name"> Discount </label>
                <input type="number" name="discount" class="form-control" id="" min="1" step=".01"
                  value="{{ $design->discount }}" required>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name"> Lang (En)</label>
                <input type="text" name="langEn" class="form-control" value="{{ $design->lang('en') }}" required
                  minlength="2" maxlength="100">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="name" class="float-right">(ع) اللغة </label>
                <input type="text" name="langAr" class="form-control text-right" value="{{ $design->lang('ar') }}"
                  required minlength="2" maxlength="100">
              </div>
            </div>
          </div>

          {{-- Font(en&&ar) // color(en&&ar) --}}
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="name"> Font (En)</label>
                <input type="text" name="fontEn" class="form-control" value="{{ $design->font('en') }}" required
                  minlength="2" maxlength="100">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="name" class="float-right">(ع) الخط </label>
                <input type="text" name="fontAr" class="form-control text-right" value="{{ $design->font('ar') }}"
                  required minlength="2" maxlength="100">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="name"> Color (En)</label>
                <input type="text" name="colorEn" class="form-control" value="{{ $design->color('en') }}" required
                  minlength="2" maxlength="100">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="name" class="float-right">(ع) اللون </label>
                <input type="text" name="colorAr" class="form-control text-right" value="{{ $design->color('ar') }}"
                  required minlength="2" maxlength="100">
              </div>
            </div>
          </div>

          {{-- details(en&&ar) --}}
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="name">Design Details (En) </label>
                <textarea name="detailsEn" class="form-control" rows="3" required minlength="2"
                  maxlength="5000">{{ $design->details('en') }}</textarea>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label class="float-right" for="name">(ع) معلومات التصميم </label>
                <textarea name="detailsAr" class="form-control text-right" rows="3" required minlength="2"
                  maxlength="5000">{{ $design->details('ar') }}</textarea>
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
              <button type="submit" class="btn btn-success"> Update </button>
            </div>
          </div>

        </form>
      </div>
    </div>


  </div>
@endsection
