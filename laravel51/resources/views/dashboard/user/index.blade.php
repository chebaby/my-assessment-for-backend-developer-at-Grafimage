@extends ('layout.main')

@section('header-title')
@section('header-title')

	liste des inscrits.
	<a class="button" href="{{ route('user.create') }}">Ajouter un client</a>
	<a class="button" href="{{ route('dashboard.survey.export') }}">Download un CSV</a>
	

@stop

@section('content')

	<div class="row">
		
		<table class="u-full-width users">
			<thead>
				<tr>
					<th>Clients</th>
					<th>Secteur</th>
					<th>Entreprise</th>
					<th>Mobile</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>

				@foreach($users as $user)
					<tr>
						<td><a href="{{ route('user.show', [ 'id' => $user->id ]) }}" title="{{ $user->first_name }}">{{ $user->first_name }} {{ $user->last_name }}</a></td>
						<td>{{ $user->sector }}</td>
						<td>{{ $user->firm }}</td>
						<td>{{ $user->mobile }}</td>
						<td>{{ $user->email }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>

	</div>


@stop