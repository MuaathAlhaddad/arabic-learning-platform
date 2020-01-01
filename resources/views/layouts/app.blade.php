<!DOCTYPE html>
<html>
	<head>

		<meta name="csrf-token" content="{{ csrf_token() }}">
		
		<title>Arabic Learning System</title>
		
		@include('layouts.style')
	</head>
	
	<body >
		
		@include('layouts.navBar')
		@yield('content')

	</body>
	
	<footer class="bg-dark py-5">
			<div class="container" style="color: white;">
				<div class="small text-center text-muted">
					Copyright &copy; 2019 - Muaadh Almrham
				</div>
			</div>

			@include('layouts.script')
	</footer>
  
</html>
