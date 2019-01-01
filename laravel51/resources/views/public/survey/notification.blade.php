@extends ('layout.main')

@section('header-title', 'Merci.')

@section('content')

	<div class="actions">
		<a class="button" href="{{ route('dashboard.survey') }}">Dashboard</a>
	</div>

@stop