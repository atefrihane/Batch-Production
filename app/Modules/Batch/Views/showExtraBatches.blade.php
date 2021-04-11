@extends('partials.layout')
@section('pageTitle')
Extra batches
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('extraBatches') }}
                </div>

                <div class="col-sm-6 text-md-right">
                    @permit('fourthStep')
                    <a href="{{route('showAddExtraBatch')}}" class="btn btn-primary">Add extra batch
                        batch</a>
                    @endpermit

                </div>
            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">
             
            @livewire('show-extra-batches')


        </div>
    </section>

</div>

@endsection

@push('scripts')
<script>
    window.addEventListener('ElementDeleted', event => {

        swal({
            title: "Success!",
            text: "Element successfully deleted!",
            icon: "success",

        });


    })

</script>
@endpush


@push('scripts')
<script>
    window.addEventListener('FileNotFound', event => {

        swal({
            title: "Error!",
            text: "File not foundi!",
            icon: "warning",

        });


    })

</script>
@endpush
