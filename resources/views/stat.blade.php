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

<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">
  <div class="input-group mb-3">
    <livesearch-component type-search="org" ph-name="Название учреждения" ar-name="поиск учреждения"></livesearch-component> 
    <div class="input-group-append">
    <span class="input-group-text"> <i class="fas fa-clinic-medical"></i> </span>
    </div>
  </div>  
</div>


<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">
  <div class="input-group mb-3">
    <livesearch-component type-search="doctor" ph-name="Ф.И.О. специалиста" ar-name="поиск специалиста"></livesearch-component> 
    <div class="input-group-append">
    <span class="input-group-text"> <i class="fas fa-user-nurse"></i> </span>
    </div>
  </div>    
</div>

<div id="charts_area" style="text-align: center; color: red; font-size: larger; font-weight: bolder;">
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
