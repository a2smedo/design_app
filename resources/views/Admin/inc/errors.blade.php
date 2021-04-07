@if ($errors->any())
<div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $err)
      <p class="my-0"> {{$err}} </p>
  @endforeach
</div>
@endif
