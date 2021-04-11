@extends('partials.layout')
@section('pageTitle')
Room 2
@endsection
@section('content')
<div class="content-wrapper">



  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2" >
    
            <div class="col-sm-6">
              {{ Breadcrumbs::render('roomTwo') }}
            </div>

         
        </div>
    </div>
</div>



  <section class="content mt-5">
    <div class="container-fluid">

    
        @livewire('show-room-two-statistics')
    </div>
  </section>

</div>

@endsection

