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
                <label for="name">Competition Name (En) </label>
                <input type="text" class="form-control" name="nameEn" value="{{ $competition->name('en') }}" required
                  minlength="2" maxlength="100">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="name" class="float-right">(ع) أسم المسابقة </label>
                <input type="text" class="form-control text-right" name="nameAr" value="{{ $competition->name('ar') }}"
                  required minlength="2" maxlength="100">
              </div>
            </div>
          </div>


          {{-- desc(en&&ar) --}}
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="name">Competition Description (En) </label>
                <textarea name="descEn" class="form-control" rows="3" required minlength="2"
                  maxlength="5000">{{ $competition->desc('en') }}</textarea>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label class="float-right" for="name">(ع) وصف المسابقة </label>
                <textarea name="descAr" class="form-control text-right" rows="3" required minlength="2"
                  maxlength="5000">{{ $competition->name('en') }}</textarea>
              </div>
            </div>
          </div>




          {{-- Started at // Expired at --}}
          <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <label for="started_at"> Started at </label>
                <input type="text" name="started_at" class="form-control" id="started_at"
                  value="{{ $competition->started_at }}" readonly>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="expired_at"> Expired at</label>
                <input type="text" name="expired_at" class="form-control" id="expired_at"
                  value="{{ $competition->expired_at }}" required>
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


@section('Script')

  <script>
    $(document).ready(function() {

      $(function() {
        $('#expired_at').datetimepicker({
          //format: 'Y-M-D h:m:s'
          format: 'YYYY/MM/DD/ h:m:s',
          minDate: getFormattedDate(new Date())

        });

        function getFormattedDate(date) {
          var day = date.getDate();
          var month = date.getMonth() + 1;
          //var month = date.getMonth() ;
          var year = date.getFullYear().toString().slice(2);
          return month + '-' + day + '-' + year;
        }

      });



    });

  </script>

@endsection
