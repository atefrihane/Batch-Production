@extends('partials.layout')
@section('pageTitle')
Update quality batch
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('updateBatchRoomThree' ,$batch) }}
                </div>


            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">
       

            @livewire('show-update-room-three-batch', ['batch' => $batch])
        </div>
    </section>

</div>

@endsection

@push('scripts')
<script>
    window.addEventListener('BatchUpdated', event => {

        swal({
            title: "Success!",
            text: "Batch successfully updated!",
            icon: "success",

        }).then((result) => {


if (result) {
    window.location.href = "{{ route('showRoomThreeBatches') }}";
}
})

    
    })

</script>
@endpush
