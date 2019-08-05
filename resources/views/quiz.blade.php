@extends('layouts.app')
@section('content')	
<div class='row align-items-center justify-content-center p-3'>
	<div class="alert alert-primary" role="alert">
	  Источник: {{ $userData }}  
	</div>
</div>
<form method="post" action="{{ route('rec_add') }}">
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<input type="hidden" name="_specToken" id="specToken" value="{{ $specToken }}">
<div class='form-row align-items-center justify-content-center p-3'>
	<div class="input-group">  
		<div class="input-group-prepend">
		<label class="btn btn-dark">
			<i class="fas fa-user-md"></i>
		</label>
		<label class="btn btn-danger">
			<i class="fas fa-thumbs-down"></i>
		</label>
		</div>	
	 	<div class="col"><input type="range" name="doctor_range" class="custom-range" id="DoctorRange" min="0" max="5" step="1"></div>
		<div class="input-group-append">  
			<label class="btn btn-success">
				<i class="fas fa-thumbs-up"></i>
			</label>
		</div>
	</div>
</div>

<div class='form-row align-items-center justify-content-center p-3'>
<div class="input-group">  
		<div class="input-group-prepend">
		<label class="btn btn-dark">
		<i class="fas fa-clinic-medical"></i>
		</label>
		<label class="btn btn-danger">
			<i class="fas fa-thumbs-down"></i>
		</label>
		</div>	
	 	<div class="col"><input type="range" name="clinic_range" class="custom-range" id="ClinicRange" min="0" max="5" step="1"></div>
		<div class="input-group-append">  
			<label class="btn btn-success">
				<i class="fas fa-thumbs-up"></i>
			</label>
		</div>
	</div>
</div>

<div class='form-row align-items-center justify-content-center p-3'>
	<textarea class="form-control" name="comment" id="comment_text" rows="5" placeholder="комментарий (по желанию)"></textarea>
</div>

<div class='row align-items-center justify-content-center p-3'>
	<div class="btn-group">
		<div class="btn btn-primary">
			<i class="fas fa-check"></i>
		</div>
		<input type="submit" name="submit" id="sendData" class="btn btn-primary" value="сохранить"> 
	</div>
</div>
</form>
@endsection
