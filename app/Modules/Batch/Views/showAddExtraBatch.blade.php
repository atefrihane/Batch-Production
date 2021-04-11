@extends('partials.layout')
@section('pageTitle')
Add extra batch
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('addExtraBatch') }}
                </div>


            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">
       

            @livewire('show-add-extra-batch')
        </div>
    </section>

</div>

@endsection

@push('scripts')
<script>
    window.addEventListener('extraBatchAdded', event => {

        swal({
            title: "Success!",
            text: " Extra batch  successfully created!",
            icon: "success",

        }).then((result) => {

/* Read more about isConfirmed, isDenied below */
if (result) {
    window.location.href = "{{ route('showExtraBatches') }}";
}
})

    
    })

</script>
@endpush
