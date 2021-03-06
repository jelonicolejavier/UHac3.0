<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8 ">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta name="csrf_token" content="{{ csrf_token() }}" />
	<title></title>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/materialize.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/styles.css') !!}">
	<script type="text/javascript" src="{!! URL::asset('../js/jquery-2.1.1.min.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/init.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/materialize.min.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/materialize.js') !!}"></script>

</head>

<body id="signupBody">

	<div style='position:absolute;z-index:0;left:0;top:0;width:100%;height:100%'>
  		<img src="{!! URL::asset('../img/background3.jpg') !!}" style='width:100%;height:auto:background-size:cover;' alt='[]' />
	</div>

	<div class="container caption center align">
      	<div class="row">
      		<br>
        	<div class="col s12 m8 push-m2">
          		<div class="card" style="opacity: -10px;">
            		<div class="card-content white-text" style="border-radius: 100px;">
              			<span class="card-title"><img src="{!! URL::asset('../img/Hooleh.png') !!}" style="height: 100px ; width: auto ;"></span>
                            <div class="container">
	              			<div class="row black-text center">
                                <h4>Report Enforcer</h4>
							    <form class="col s12 black-text">
							      	<div class="row">							        	
							        	<div class="input-field col s12">
							          		<input placeholder="Report Message" id="report" type="text" class="validate">
							          		<label for="first_name">Report Enforcer</label>
							        	</div>
							        	
							      	</div>
							    </form>
						    </div>
                            </div>
            		</div>
            		<div class="card-action center">
						<a class="waves-effect waves-light btn green lighten-1" id = 'btnSubmit'><i class="material-icons right">send</i>submit</a>
            		</div>
          		</div>
        	</div>
      	</div>
	</div>

	<script type="text/javascript">
	$(document).ready(function() {
      $('select').material_select();
      $('.slider').slider({full_width: true});
    });    
	</script>

<script type="text/javascript">
$(document).ready(function(){
	$('#btnSubmit').click(function(){
		$.ajax({
			type: "POST",
			url: "{{action('ReportController@store')}}",
			beforeSend: function (xhr) {
				var token = $('meta[name="csrf_token"]').attr('content');

				if (token) {
					  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
				}
			},
			data: {
				strDescription: $("#report").val()
			},
			success: function(data){
				confirm('success');
				window.location.href = '{{ URL::to("/dashboard") }}';
			},
			error: function(data){
				var toastContent = $('<span>Error Occured. </span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');

			}
		});//ajax
	});
});
</script>


</body>
</html>