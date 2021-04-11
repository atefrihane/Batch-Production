@extends('partials.layout')
@section('pageTitle')
Batches
@endsection
@section('content')
<style>
   @media print {
       .error,
       #search,
       .form-inline {
         display: none;
       }
      }
</style>
<div class="content-wrapper">



  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2" >
    
            <div class="col-sm-6">
              {{ Breadcrumbs::render('batches') }}
            </div>

            <div class="col-sm-6 text-md-right">
              @permit('firstStep')
              <a href="{{route('showAddBatch')}}" class="btn btn-primary">Add a batch</a>
              <a href="#" class="btn btn-success" id="print-click">Print</a>
              @endpermit

     
         
               
                </div>
        </div>
    </div>
</div>



  <section class="content mt-5">
    <div class="container-fluid" id="app">

      <qr-code-scanner> </qr-code-scanner>

      <livewire:show-batches />
    </div>
  </section>

</div>

@endsection







@push('scripts')
<script src="{{asset('/js/livewire_listeners.js')}}"></script>
<script src="{{mix('/js/scanner.js')}}"></script>
<script>
  $('#print-click').click(function(){
   window.print()
  })


</script>
@endpush