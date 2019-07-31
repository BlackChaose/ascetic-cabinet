<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        
        <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
        <link href="css/select2.css" rel="stylesheet" />
        <script src="js/select2.js"></script>
    </head>
    <body>
        
        <header>Application</header>
        <section>
			<button id="btnSend">send</button>
			<button id="btnGet">getData</button>
        </section>
        <section id="App">
        </section>
        <section id="form">
            @csrf		
            <select id="f_rec" name="filter_record" class="js-example-basic-single">
                <option value="AL">Alabama</option>
                <option value="WY">Wyoming</option>
            </select>	
        </section>
        
        <footer>
			&copy;RedAlert 2019, Moscow
        </footer>
        <script>
       document.addEventListener('DOMContentLoaded', function(){
				if((el = document.querySelector("#btnSend")) !== null)
				{
				document.addEventListener('click',function(){
						var xhttp = new XMLHttpRequest();				
						var data = {
								"new_record":{
								"id":2,
								"ticket_num":"C20190727-5000",
								"name_org":"ГБУЗ ГП №23 ДЗМ филиал №3",
								"data_visit":"09-08-2019, Пт, 12:48",
								"doctor_name":"Врач-терапевт",
								"doctor_spec":"Ухмалов Айзек Мафусаилович",
								"cab_num":"637",
						}};
						
						data._token = "{{ csrf_token() }}";						
						xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {								
							console.log( xhttp.responseText);
						}				
						};
						
				xhttp.open("POST", "{{ route('rec_add') }}", true);
				xhttp.setRequestHeader("Content-type", "application/json");
                xhttp.send(JSON.stringify(data));
					});
					

				}
				if((el = document.querySelector("#btnGet")) !== null){
				document.addEventListener('click',function(){
						var xhttp = new XMLHttpRequest();				
						var data = {};						
						data._token = "{{ csrf_token() }}";						
						xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {								
							console.log( xhttp.responseText);
					    } 
	            };
	
				xhttp.open("POST", "{{ route('get_all_recs') }}", true);
				xhttp.setRequestHeader("Content-type", "application/json");
                xhttp.send(JSON.stringify(data));
					});
				}

                //select
                // if((el = document.querySelector("#f_rec")) !== null){
				// document.addEventListener('click',function(e){
                //         console.log(e.value);
				// 		var xhttp = new XMLHttpRequest();				
				// 		var data = {};						
				// 		data._token = "{{ csrf_token() }}";						
                //         data.filter_record=e.value;
				// 		xhttp.onreadystatechange = function() {
				// 		if (this.readyState == 4 && this.status == 200) {								
				// 			console.log( xhttp.responseText);
				// 	    } 
	            // };
	
				// xhttp.open("POST", "{{ route('filter_rec') }}", true);
				// xhttp.setRequestHeader("Content-type", "application/json");
                // xhttp.send(JSON.stringify(data));
				// 	});
				// }


                $('.js-example-basic-single').select2({

                ajax: {
                    url: '/records_search',
                    data: function (params) {
                    var query = {
                     search: params.term,
                     type: 'public'
                }

                // Query parameters will be ?search=[term]&type=public
                return query;
                    }
                }    

                });

		});
        </script>
    </body>
</html>

