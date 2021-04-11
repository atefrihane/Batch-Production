@extends('partials.layout')
@section('pageTitle')
Update category
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('updateCategory',$category) }}
                </div>


            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">
            @livewire('show-update-category', ['category' => $category])

        </div>
    </section>

</div>

@endsection
@push('scripts')
<script>
    window.addEventListener('CategoryUpdated', event => {

        swal({
            title: "Success!",
            text: "Category successfully updated!",
            icon: "success",

        }).then((result) => {

            /* Read more about isConfirmed, isDenied below */
            if (result) {
                window.location.href = "{{ route('showCategories') }}";
            }
        })

    })

    window.addEventListener('CategoryAlreadyExist', event => {

        swal({
            title: "Oups!",
            text: "Category already typed !",
            icon: "warning",

        });

    })


    window.addEventListener('CategoryCodeAlreadyExist', event => {

swal({
    title: "Oups!",
    text: "Category code already typed !",
    icon: "warning",

});

})

</script>
@endpush
