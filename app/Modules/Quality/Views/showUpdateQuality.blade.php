@extends('partials.layout')
@section('pageTitle')
Update quality
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('updateQuality',$quality) }}
                </div>


            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">
                @livewire('show-update-quality', ['quality' => $quality])
    
        </div>
    </section>

</div>

@endsection

@push('scripts')
<script>
    window.addEventListener('QualityUpdated', event => {

        swal({
            title: "Success!",
            text: "Quality updated !",
            icon: "success",

        });

     
    })

</script>
@endpush
