@extends('partials.layout')
@section('pageTitle')
Sub batches
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('subBatches',$batch) }}
                </div>

                <div class="col-sm-6 text-md-right">
                    @permit('secondStep')
                    <a href="{{route('showAddSubBatch',$batch->id)}}" class="btn btn-primary">Add a season sort
                        batch</a>
                    @endpermit
                </div>
            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid" id="app">
                <qr-code-scanner> </qr-code-scanner>
            @livewire('show-sub-batches', ['batch' => $batch])


        </div>
    </section>

</div>

@endsection



@push('scripts')
<script src="{{asset('/js/livewire_listeners.js')}}"></script>
<script src="{{mix('/js/scanner.js')}}"></script>
@endpush