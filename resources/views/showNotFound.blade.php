@extends('partials.layout')
@section('pageTitle', 'Oups!')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-12">

            </div>
        </div>
    </div>
</div>
<section class="content mt-5" style="height:100vh;">
        <div class="error-page">
          <h2 class="headline text-warning"> 404</h2>
  
          <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
  
            <p>
              We could not find the page you were looking for.
              Meanwhile, you may <a href="{{route('showHome')}}">return to dashboard</a> 
            </p>
  
 
          </div>
          <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
      </section>

@endsection
