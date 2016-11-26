<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8 ">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
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
  		<img src="{!! URL::asset('../img/background1.jpg') !!}" style='width:100%;height:100%' alt='[]' />
	</div>

	<div class="container caption center align">
      	<div class="row">
      		<br>
        	<div class="col s12 m8 push-m6">
          		<div class="card" style="opacity: -10px;">
            		<div class="card-content white-text" style="border-radius: 100px;">
              			<span class="card-title"><img src="{!! URL::asset('../img/car.png') !!}" style="height: 100px ; width: 100px ;"></span>
	              			<div class="row black-text">
							    <form class="col s12 black-text">
							      	<div class="row">
							        	<div class="input-field col s6">
							          		<input placeholder="N01-04-01***" id="license" type="text" class="validate">
							          		<label for="license">License Number</label>
							        	</div>
							        	<div class="input-field col s6">
										    <select>
											    <option value="1">Student</option>
											    <option value="2">Non Pro</option>
										        <option value="3">Pro</option>
										    </select>
										    <label>License Type</label>
									  	</div>
							          	<div class="input-field col s12">
										    <select multiple>
										      	<option value="1">1 Motorcycles / Motorized Tricycles</option>
										      	<option value="2">2 Vehicle up to 4500 KGS GVW</option>
										      	<option value="3">3 Vehicle above 4500 KGS GVW</option>
										      	<option value="4">4 Automatic clutch up to 4500 KGS GVW</option>
										      	<option value="5">5 Automatic clutch above 4500 KGS GVW</option>
										      	<option value="6">6 Articulated vehicle 1600 KGS GVW and below</option>
										      	<option value="7">7 Articulated vehicle 1601 up to 4500 KGS GVW</option>
										      	<option value="8">8 Articulated vehicle 4501 KGS and above GVW</option>
										    </select>
										    	<label>Restriction</label>
										</div>
							        	<div class="input-field col s4">
							          		<input placeholder="Juan" id="first_name" type="text" class="validate">
							          		<label for="first_name">First Name</label>
							        	</div>
							        	<div class="input-field col s4">
							          		<input placeholder="Cruz" id="last_name" type="text" class="validate">
							          		<label for="last_name">Last Name</label>
							        	</div>
							        	<div class="input-field col s4">
							          		<input placeholder="Dela" id="middle_name" type="text" class="validate">
							          		<label for="middle_name">Middle Name</label>
							        	</div>
										<div class="input-field col s6">
							          		<input placeholder="JeloHaveBeer" id="user_name" type="text" class="validate">
							          		<label for="user_name">Username</label>
							        	</div>
										<div class="input-field col s6">
							          		<input id="password" type="password" class="validate">
							          		<label for="password">Password</label>
							        	</div>
							      	</div>
							    </form>
						    </div>
            		</div>
            		<div class="card-action center">
	            		<a class="waves-effect waves-light btn red lighten-1"><i class="material-icons left">cancel</i>cancel</a>
						<a class="waves-effect waves-light btn green lighten-1"><i class="material-icons right">done</i>submit</a>
            		</div>
          		</div>
        	</div>
      	</div>
	</div>

	<script type="text/javascript">
	  $(document).ready(function() {
      $('select').material_select();
    });    
	</script>

	<script type="text/javascript">
  	  $(document).ready(function(){
	  $('.slider').slider({full_width: true});
	  });
	</script>

</body>
</html>