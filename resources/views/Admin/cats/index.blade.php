@extends('Admin.layout')


@section('head')
  Categories
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

    <div class="row">
        <div class="col">
            @include('Admin.inc.errors')
        </div>
    </div>

    <div class="row">
      <div class="col">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> All Categories </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addModal" title="Add new Category">
                Add new
              </button>
            </div>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name (en) </th>
                <th>Name (ar) </th>
                <th>Image</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($cats as $cat)
                <tr>
                  <td> {{ $loop->iteration }} </td>
                  <td> {{ $cat->name('en') }} </td>
                  <td> {{ $cat->name('ar') }} </td>

                  <td> <img src="{{ asset("uploads/$cat->img") }} " alt="" style="height:30px;"></td>

                  <td>
                    @if ($cat->active == 1)
                      <span class="badge badge-success">Active</span>
                    @else
                      <span class="badge badge-danger">Deactive</span>
                    @endif
                  </td>




                  <td> {{ $cat->created_at }} </td>

                  <td>

                    <button type="button" class="btn btn-sm btn-warning editBtn" data-toggle="modal"
                      data-target="#editModal" data-id=" {{ $cat->id }} " data-name-en="{{ $cat->name('en') }}"
                      data-name-ar="{{ $cat->name('ar') }}"
                      title="Edit Category">
                      <i class="fas fa-edit"></i>
                    </button>

                    <a class="btn btn-sm btn-danger" href=" {{ url("/dashboard/cats/delete/{$cat->id}") }} " title="Delete Category" onclick="return confirm('Are you sure?')">
                      <i class="fas fa-trash"></i>
                    </a>

                    <a class="btn btn-sm btn-secondary" href=" {{ url("/dashboard/cats/toggle/{$cat->id}") }} " title="Open or Closed Status">
                      <i class="fas fa-toggle-on"></i>
                    </a>

                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <div class="d-flex justify-content-center py-2 my-2">
            {{ $cats->links() }}
          </div>
        </div>
      </div>


    </div>

  </div>





  <div class="modal fade show" id="addModal" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"> Add New Category </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">??</span>
          </button>
        </div>
        <div class="modal-body">

          <form id="addForm" method="POST" action=" {{ url('/dashboard/cats/store') }} " enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="name">Category Name (En) </label>
              <input type="text" class="form-control" name="nameEn" required minlength="2" maxlength="100">
            </div>

            <div class="form-group">
              <label for="name" class="float-right">(??) ?????? ?????????? </label>
              <input type="text" class="form-control text-right" name="nameAr" required minlength="2" maxlength="100">
            </div>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="img" required  accept="image/*">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="addForm">Save</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade show" id="editModal" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"> Edit Category </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">??</span>
          </button>
        </div>
        <div class="modal-body">


          <form id="editForm" method="POST" action=" {{ url('/dashboard/cats/update') }} "
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="editId">

            <div class="form-group">
              <label for="name">Category Name (En) </label>
              <input type="text" class="form-control" name="nameEn" id="nameEn" required minlength="2" maxlength="100">
            </div>

            <div class="form-group">
              <label for="name" class="float-right">(??) ?????? ?????????? </label>
              <input type="text" class="form-control text-right" name="nameAr" id="nameAr" required minlength="2" maxlength="100">
            </div>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="img"   accept="image/*">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="editForm">Update changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection



@section('Script')

  <script>
    $('.editBtn').click(function() {
      let id = $(this).attr('data-id');
      let name_en = $(this).attr('data-name-en');
      let name_ar = $(this).attr('data-name-ar');

      $('#editId').val(id);
      $('#nameEn').val(name_en);
      $('#nameAr').val(name_ar);


    });

  </script>

@endsection
