@extends('partials.layout')
@section('pageTitle')
Update user
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
       
            @livewire('show-update-user', ['user' => $user])
        </div>
    </section>

</div>

@endsection

@push('scripts')
<script>
    window.addEventListener('UserUpdated', event => {

        swal({
            title: "Success!",
            text: "User successfully updated!",
            icon: "success",

        });

     
    })

</script>
@endpush
