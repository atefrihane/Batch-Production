@extends('partials.layout')
@section('pageTitle')
Room 1
@endsection
@section('content')
<div class="content-wrapper">



  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2" >
    
            <div class="col-sm-6">
              {{ Breadcrumbs::render('roomOne') }}
            </div>

         
        </div>
    </div>
</div>



  <section class="content mt-5">
    <div class="container-fluid">

    
        @livewire('show-room-one-statistics')
    </div>
  </section>

</div>

@endsection

