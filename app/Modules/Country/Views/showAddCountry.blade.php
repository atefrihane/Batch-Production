@extends('partials.layout')
@section('pageTitle')
Add country
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('addCountry') }}
                </div>


            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">
            <livewire:show-add-country />
        </div>
    </section>

</div>

@endsection

@push('scripts')
<script>
    window.addEventListener('CountryAdded', event => {

        swal({
            title: "Success!",
            text: "Country successfully created!",
            icon: "success",

        });

        // $('.modal').modal('hide');
    })

</script>
@endpush
