
			<!-- Font Awesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
		<!-- Bootstrap core CSS -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		{{-- tutor form: preferdTime and PreferdDay --}}
		<link href ="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
		
		<style>	
				@font-face {
					font-family: sukar_bold;
					src: url('/fonts/sukar-bold.ttf');
				}
				@font-face {
					font-family: jannat_bold;
					src: url('/fonts/a-jannat-lt-bold.otf');
				}
				@font-face {
					font-family: arabtype;
					src: url('/fonts/arabtype.ttf');
				}
				/*----Tutor DayTime schedule ---  */
				.timeslot-container label {
				width: 100%;
				}
				/*to make check box within the my big div*/
				.timeslot-container input[type="radio"]:empty,
				.timeslot-container input[type="checkbox"]:empty {
				display: none;
				}

				/*layout for the div*/
				.timeslot-container input[type="radio"]:empty ~ label,
				.timeslot-container input[type="checkbox"]:empty ~ label {
				position: relative;
				line-height: 2.3em;
				text-indent: 3.25em;
				cursor: pointer;
				-webkit-user-select: none;
					-moz-user-select: none;
					-ms-user-select: none;
						user-select: none;
				}

				/*for the small green box which checked*/
				.timeslot-container input[type="radio"]:empty ~ label:before,
				.timeslot-container input[type="checkbox"]:empty ~ label:before {
				position: absolute;
				display: block;
				top: 0;
				bottom: 0;
				left: 0;
				content: '';
				width: 100%;
				background: #D1D3D4;
				}
				.timeslot-success input[type="radio"]:checked ~ label:before,
				.timeslot-success input[type="checkbox"]:checked ~ label:before {
				background-color: #5cb85c;
				}

		</style>