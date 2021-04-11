@extends('partials.layout')
@section('pageTitle')
Reportings
@endsection
@section('content')
<div class="content-wrapper">



  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
    
            <div class="col-sm-6">
              {{ Breadcrumbs::render('pricings') }}
            </div>

            <div class="col-sm-6 text-md-right">
            <a href="{{route('showAddPricing')}}" class="btn btn-primary">Add a pricing</a>
               
                </div>
        </div>
    </div>
</div>



  <section class="content mt-5">
    <div class="container-fluid">
      <livewire:show-pricings />
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