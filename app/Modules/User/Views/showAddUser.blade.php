@extends('partials.layout')
@section('pageTitle')
Add user
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('addUser') }}
                </div>


            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">
            <livewire:show-add-user />
        </div>
    </section>

</div>

@endsection

@push('scripts')
<script>
    window.addEventListener('UserAdded', event => {

        swal({
            title: "Success!",
            text: "User successfully created!",
            icon: "success",

        });

     
    })

</script>
@endpush
