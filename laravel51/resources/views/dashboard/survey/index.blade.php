@extends ('layout.main')

@section('header-title', 'Simple dashboard.')

@section('content')

	<div class="actions">
		@include('flash::message')
		<div class="six columns">
			<a class="button u-full-width" href="{{ route('dashboard.users') }}">liste des inscrits</a>
		</div>
		<div class="six columns">
			<a class="button u-full-width" href="{{ route('dashboard.survey.export') }}">Download CSV</a>
		</div>
	</div>

@stop