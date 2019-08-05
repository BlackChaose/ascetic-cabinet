@extends('layouts.app')
@section('content')	
<div id="QR-section" class="row align-items-center justify-content-center p-3">    
   {{-- <qrreader-component></qrreader-component> --}}
   <debugbtn-component></debugbtn-component>
</div>
<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="min-height: 200px;">
  <!-- Then put toasts within -->
  <div id="message" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="16000">
    <div class="toast-header">
      <img src="" class="rounded mr-2" alt="">
      <strong class="mr-auto">Народный рейтинг</strong>
      <small> согласен </small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      Сканируя QR, вы принимаете условия использования сервиса
      "Народный рейтинг" и понимаете, что информация о визите к врачу - а именно:
      Дата, Время, №талона, Ф.И.О Врача, Название учреждения - будет передана третьим лицам
      и в общий доступ в сети интернет. 
      Также необходимо будет пройти опрос.
      Обращаем внимамание - опрос анонимный, мы не получаем данные о Вас, а только указанную выше информацию
      и Вашы отзывы.
      Спасибо за то, что вы не равнодушны!
      <hr>
      Если Вы хотите только посмотреть статистику, перейдите по ссылке ниже:<br>
      <a id="goToStat" href="{{ route('search') }}" >Посмотреть статистику</a>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready( function(){
    $('#message').toast('show');
    $('#message').on('hidden.bs.toast', function () {
           $('#QR-section').css('display','block'); 
})
} );
</script>
@endsection