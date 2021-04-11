@extends('partials.layout')
@section('pageTitle')
Add quality batch
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('addBatchQuality' ,$checkQualityBatch) }}
                </div>


            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">


            @livewire('show-add-quality-batch', ['batch' => $checkQualityBatch])
        </div>
    </section>

</div>

@endsection

@push('scripts')
<script>
    window.addEventListener('BatchQualityAdded', event => {

        swal({
            title: "Success!",
            text: " quality successfully created!",
            icon: "success",

        }).then((result) => {

/* Read more about isConfirmed, isDenied below */
if (result) {
    window.location.href = "{{ route('showBatchQualities',$checkQualityBatch->id) }}";
}
})

    
    })

</script>
@endpush