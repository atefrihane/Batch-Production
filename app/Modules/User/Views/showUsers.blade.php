@extends('partials.layout')
@section('pageTitle')
Show users
@endsection
@section('content')
<div class="content-wrapper">



  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
    
            <div class="col-sm-6">
              {{ Breadcrumbs::render('users') }}
            </div>

            <div class="col-sm-6 text-md-right">
            <a href="{{route('showAddUser')}}" class="btn btn-primary">Add a user</a>
               
                </div>
        </div>
    </div>
</div>



  <section class="content mt-5">
    <div class="container-fluid">
      <livewire:show-users />
    </div>
  </section>

</div>

@endsection

@push('scripts')
<script>
 window.addEventListener('ElementDeleted', event => {

  swal({
  title: "Success!",
  text: "Element successfully deleted!",
  icon: "success",

});


})
   

</script>
@endpush