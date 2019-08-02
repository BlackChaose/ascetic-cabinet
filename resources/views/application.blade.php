@extends('layouts.app')        

@section('content')    

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text"> <i class="fas fa-clinic-medical"></i> </span>
  </div>
  <input type="text" class="form-control" placeholder="Учреждение" aria-label="Учреждение" aria-describedby="basic-addon1">
  <div class="input-group-append">
	<span class="input-group-text"> <i class="fas fa-search"></i> </span>
  </div>
</div>   

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

