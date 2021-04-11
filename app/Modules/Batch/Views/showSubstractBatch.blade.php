@extends('partials.layout')
@section('pageTitle')
Substract from  batch
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
          
                    {{ Breadcrumbs::render('substractBatchStepOne',$batch) }}
     

              


               
                  
                </div>


            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">

     

            @livewire('show-substract-step-one', ['batch' => $batch])
           
        

      
          
       
        </div>
    </section>

</div>

@endsection

@push('scripts')


    <script>

window.addEventListener('BatchAdded', event => {

swal({
    title: "Success!",
    text: "Batch successfully created!",
    icon: "success",

}).then((result) => {

    /* Read more about isConfirmed, isDenied below */
    if (result) {
        window.location.href = "{{ route('showBatches') }}";
    }
})


})

        window.addEventListener('ErrorQuantity', event => {

            swal({
                title: "Oups!",
                text: "The quantity is greater than the source weight",
                icon: "error",

            })


        })

    </script>
@endpush
