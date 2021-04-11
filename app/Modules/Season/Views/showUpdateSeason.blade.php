@extends('partials.layout')
@section('pageTitle')
Update season
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('updateSeason',$season) }}
                </div>


            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">
                @livewire('show-update-season', ['season' => $season])
    
        </div>
    </section>

</div>

@endsection

@push('scripts')
<script>
    window.addEventListener('SeasonUpdated', event => {

        swal({
            title: "Success!",
            text: "Season updated !",
            icon: "success",

        });

     
    })

</script>
@endpush
