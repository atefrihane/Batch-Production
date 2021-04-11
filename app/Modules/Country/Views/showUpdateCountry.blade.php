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
                    {{ Breadcrumbs::render('updateCountry',$country) }}
                </div>


            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">
                @livewire('show-update-country', ['country' => $country])
    
        </div>
    </section>

</div>

@endsection

@push('scripts')
<script>
    window.addEventListener('CountryUpdated', event => {

        swal({
            title: "Success!",
            text: "Country updated !",
            icon: "success",

        });

     
    })

</script>
@endpush
