<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>JDE</title>

	{!!Html::style('css/main.css')!!}
	
</head>
<body>

	<div class="container">

		@include('layout.partials.header')

		<div class="row">
			
			<main>

				@include('flash::message')

				@yield('content')

			</main>

		</div>

		@include('layout.partials.footer')

	</div>

	{!!Html::script('js/jquery.min.js')!!}
	{!!Html::script('js/parsley.min.js')!!}
	{!!Html::script('js/app.js')!!}

</body>
</html>