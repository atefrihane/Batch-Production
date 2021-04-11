<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    <style>
     
        @media print {
            #print {
                display: none;
            }
        }
    </style>
    <title>{{$batch->name}}</title>
</head>

<body class="vh-100">
    <div class="container d-flex flex-column h-100">
  
      
        <div class="d-flex flex-column mx-auto h-100" style="margin-top:10rem;">
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($batch->id, 'C39')}}" alt="barcode" style="height:100px;width:300px;object-fit:contain;" />
            @if ($batch->step == 1)
            <h1 class="text-center mt-4">{{ucfirst($batch->country->name)}} / {{ucfirst($batch->name)}} / {{$batch->weight}}kg </h1>
            @endif
    
            @if ($batch->step == 2)
            <h1 class="text-center mt-4">{{$batch->id}} / {{ucfirst($batch->code)}} / {{$batch->weight}}kg </h1>
            @endif
    
    
            @if ($batch->step == 3)
            <h1 class="text-center mt-4">{{$batch->id}} / {{ucfirst($batch->categories->first()->code)}} /  {{ucfirst($batch->categories->last()->code)}} / {{$batch->weight}}kg </h1>
            @endif

            <div class="d-flex justify-content-center">
                <a href="" class="btn btn-primary text-center" id="print">Print</a>
    
            </div>
    
        </div>

       
      

      


    </div>


</body>
<script src="{{mix('/js/app.js')}}"></script>
<script>
    $('#print').click(function(){
    window.print()
})

</script>

</html>