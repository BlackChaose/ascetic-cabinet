@extends('layouts.app')
@section('content')	
<div class='row align-items-center justify-content-center p-3'>
	<div class="alert alert-primary" role="alert">
	  Опрос о вашем впечатлении о:   
	</div>
</div>

<div class='row align-items-center justify-content-center p-3'>
<div class="btn-group btn-group-toggle" data-toggle="buttons">
	  <label class="btn btn-dark">
		<i class="fas fa-user-md"></i>
	  </label>
	  <label class="btn btn-success">
		<input type="radio" name="options" id="option2" autocomplete="off"> <i class="fas fa-thumbs-up"> хорошо</i>
	  </label>
	  <label class="btn btn-danger">
		<input type="radio" name="options" id="option3" autocomplete="off"> <i class="fas fa-thumbs-down"> плохо</i>
	  </label>
	</div>
</div>

<div class='row align-items-center justify-content-center p-3'>
	<div class="btn-group btn-group-toggle" data-toggle="buttons">	  	
	  <label class="btn btn-dark">
		<i class="fas fa-clinic-medical"></i>
	  </label>		  	
	  <label class="btn btn-success">
		<input type="radio" name="options" id="option2" autocomplete="off"> <i class="fas fa-thumbs-up"> хорошо</i>
	  </label>
	  <label class="btn btn-danger">
		<input type="radio" name="options" id="option3" autocomplete="off"> <i class="fas fa-thumbs-down"> плохо</i>
	  </label>
	</div>
</div>

<div class='row align-items-center justify-content-center p-3'>
	<div class="btn-group">
		<div class="btn btn-info">
			<i class="far fa-edit"></i>
		</div>
		<div class="btn btn-info">
				комментировать	
		</div>
	</div>
</div>

<div class='row align-items-center justify-content-center p-3'>
	<div class="btn-group">
		<div class="btn btn-primary">
			<i class="fas fa-check"></i>
		</div>
		<div class = "btn btn-primary">		
			завершить опрос
		</div>
	</div>
</div>
@endsection
