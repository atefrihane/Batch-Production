@extends('partials.layout')
@section('pageTitle')
Reportings
@endsection
@section('content')
<div class="content-wrapper">

    <div class="content-header ml-2">
        {{ Breadcrumbs::render('home') }}
    </div>



    <section class="content mt-5">
        <div class="container-fluid" id="app">


            <show-statistics :statistics="{{$statistics}}" :countries="{{$countries}}" :qualities="{{$qualities}}" :categories_count="{{$countCategories}}">
            </show-statistics>


            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
@push('scripts')
<script src="{{asset('/js/statistics.js')}}"></script>
@endpush
