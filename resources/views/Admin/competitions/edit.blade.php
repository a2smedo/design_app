@extends('Admin.layout')


@section('head')
  Edit Competition
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

        <form method="POST" action="{{ url("dashboard/competitions/update/$competition->id") }}">
          @csrf

          {{-- name(en&&ar) --}}
          <div class="row">


            <div class="col">
              <div class="form-group">
                <label for="name">Competition Name </label>
                <input type="text" class="form-control" name="nameEn"
                value="{{$competition->name('en')}}">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="name" class="float-right"> أسم المسابقة </label>
                <input type="text" class="form-control text-right" name="nameAr" value="{{$competition->name('ar')}}">
              </div>
            </div>
          </div>


          {{-- desc(en&&ar) --}}
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="name">Competition Description </label>
                <textarea name="descEn" class="form-control" rows="3">{{$competition->desc('en')}}</textarea>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label class="float-right" for="name"> وصف المسابقة </label>
                <textarea name="descAr" class="form-control text-right" rows="3">{{$competition->name('en')}}</textarea>
              </div>
            </div>
          </div>




          {{-- Started at // Expired at --}}
          <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <label for="started_at"> Started at </label>
                <input type="text" name="started_at" class="form-control" id="started_at" value="{{$competition->started_at}}" >
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="expired_at"> Expired at</label>
                <input type="text" name="expired_at" class="form-control" id="expired_at" value="{{$competition->expired_at}}">
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
