@extends('partials.layout')
@section('pageTitle')
Update batch
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('updateBatch' , $batch) }}
                </div>


            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">
            @livewire('show-update-batch', ['batch' => $batch])
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

                /* Read more about isConfirmed, isDenied below */
                if (result) {
                    window.location.href = "{{ route('showBatches') }}";
                }
            })


        })

    </script>
@endpush
@push('scripts')
    <script>
        window.addEventListener('BatchNotFound', event => {

            swal({
                title: "Error!",
                text: "Batch not found!",
                icon: "warning",

            });


        })

    </script>
@endpush
