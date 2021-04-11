@extends('partials.layout')
@section('pageTitle')
Update extra batch
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
       

            @livewire('show-update-extra-batch' , ['id' => request()->id])
        </div>
    </section>

</div>

@endsection

@push('scripts')
<script>
    window.addEventListener('extraBatchUpdated', event => {

        swal({
            title: "Success!",
            text: " Extra batch  successfully created!",
            icon: "success",

        });

    
    })

</script>
@endpush
