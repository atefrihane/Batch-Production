@extends('partials.layout')
@section('pageTitle')
Reselled batches
@endsection
@section('content')
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2" >
    
            <div class="col-sm-6">
              {{ Breadcrumbs::render('reselledBatches') }}
            </div>

         
        </div>
    </div>
</div>



  <section class="content mt-5">
    <div class="container-fluid" >



            @livewire('show-reselled-batches')
    </div>
  </section>

</div>

@endsection







@push('scripts')
<script src="{{asset('/js/livewire_listeners.js')}}"></script>

@endpush