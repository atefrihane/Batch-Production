@extends('partials.layout')
@section('pageTitle')
Add quality
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('addQuality') }}
                </div>


            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">
            <livewire:show-add-quality />
        </div>
    </section>

</div>

@endsection

@push('scripts')
<script>
    window.addEventListener('QualityAdded', event => {

        swal({
            title: "Success!",
            text: "Quality successfully created!",
            icon: "success",

        }).then((result) => {

            /* Read more about isConfirmed, isDenied below */
            if (result) {
                window.location.href = "{{ route('showQualities') }}";
            }
        })

        // $('.modal').modal('hide');
    })

</script>
@endpush
