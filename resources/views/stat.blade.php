@extends('layouts.app')        

@section('content')    
<h1>Посмотреть отзывы:</h1>
@if(!empty($message))
<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">
  <!-- Then put toasts within -->
  <div class="alert alert-info" role="alert">
      {{ $message }}
  </div>  

</div>
@endif

<livesearch-component></livesearch-component> 

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text"> <i class="fas fa-user-nurse"></i> </span>
  </div>
  <input type="text" class="form-control" placeholder="Специалист" aria-label="Специалист" aria-describedby="basic-addon1">
  <div class="input-group-append">
	<span class="input-group-text"> <i class="fas fa-search"></i> </span>
  </div>
</div>            
@endsection
@section('script')
<script>
$(document).ready( function(){
    $('#message').toast('show');
    $('#message').on('hidden.bs.toast', function () {
      $('#message').css('display','none'); 
})
} );
</script>
@endsection
