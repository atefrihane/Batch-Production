@extends('partials.layout')
@section('pageTitle')
Add sub batch
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('addSubBatch' ,$batch) }}
                </div>


            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">


            @livewire('show-add-sub-batch', ['batch' => $batch])
        </div>
    </section>

</div>

@endsection

@push('scripts')
    <script>
        window.addEventListener('SubBatchAdded', event => {

            swal({
                title: "Success!",
                text: "Sub batch successfully created!",
                icon: "success",

            }).then((result) => {

                /* Read more about isConfirmed, isDenied below */
                if (result) {
                    window.location.href = "{{ route('showManageSubBatches',$batch->id) }}";
                }
            })


        })

    </script>
@endpush
