<!DOCTYPE html>
<html>
	<head>
		<title>{{$titleSection}}</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		@include("partials/includes")
		@yield("customJS")	    
	</head>
	<body>
		<div class="container">
			@yield("content")			
		</div>	
	</body>
</html>