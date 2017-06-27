<!doctype html>
<html lang = "en">
	<head>
		<meta charset="UTF-8">
		<title>	@yield('title')</title>
		<link rel = "stylesheet" href = "/css/main.css">
		@yield('style')
	</head>
	<body>
		@include('layouts.header')
		<div class = "main">
			@yield('content')
		</div>
	</body>
</html>