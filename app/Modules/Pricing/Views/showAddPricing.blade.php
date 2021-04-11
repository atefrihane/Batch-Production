@extends('partials.layout')
@section('pageTitle')
Add pricing
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('addPricing') }}
                </div>


            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">
            <livewire:show-add-pricing />
        </div>
    </section>

</div>

@endsection

@push('scripts')
<script>
    window.addEventListener('PricingAdded', event => {

        swal({
            title: "Success!",
            text: "Pricing successfully created!",
            icon: "success",

        }).then((result) => {

            /* Read more about isConfirmed, isDenied below */
            if (result) {
                window.location.href = "{{ route('showPricings') }}";
            }
        })

    })

</script>
@endpush
