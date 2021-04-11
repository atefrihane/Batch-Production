@extends('partials.layout')
@section('pageTitle')
Add season
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('addSeason') }}
                </div>


            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">
            <livewire:show-add-season />
        </div>
    </section>

</div>

@endsection

@push('scripts')
<script>
    window.addEventListener('SeasonAdded', event => {

        swal({
            title: "Success!",
            text: "Season successfully created!",
            icon: "success",

        });

        // $('.modal').modal('hide');
    })

</script>
@endpush
