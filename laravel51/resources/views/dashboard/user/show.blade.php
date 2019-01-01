@extends ('layout.main')

@section('header-title')

	{{ $user->first_name }} {{ $user->first_name }}
	<a class="button" href="{{ route('user.edit', [ 'id' => $user->id ]) }}">Modifier</a>
  	<a class="button" onclick="document.getElementById('delete-user').submit();">Suprimer</a>
  	<a class="button" href="{{ route('dashboard.users') }}">liste des inscrits</a>
	

@stop



@section('content')

	<div class="row">
		
		<ul class="u-full-width users">

			<li><strong>Nom/Prénon : </strong> <span> {{ $user->first_name }} {{ $user->first_name }}</span></li>
			<li><strong>Email : </strong> <span> {{ $user->email }}</span></li>
			<li><strong>Mobile : </strong> <span> {{ $user->mobile }}</span></li>
			<li><strong>Entreprise : </strong> <span> {{ $user->firm }}</span></li>
			<li><strong>Secteur d'activité : </strong> <span> {{ $user->sector }}</span></li>
			<li><strong>Souhait-il rencontrer l'un de nos représentants sur le salon ? : </strong> <span> {{ $user->question_one }}</span></li>
			<li><strong>Souhait-il recevoir de la documentation sur nos solutions ? : </strong> <span> {{ $user->question_two }}</span></li>
			<li><strong>Souhait-il participer à un de nos ateliers Barista ? : </strong> <span> {{ $user->question_three }}</span></li>
			<li><strong>créneau préféré : </strong> <span> {{ $user->favorite_slot }}</span></li>

		</ul>

	</div>

	{!! Form::open(
		[ 
			'route' => [ 'user.destroy', $user->id ],
			'id' => 'delete-user',
			'method' => 'delete'
		])
	!!}

	  <input type="hidden" name="name" value="value" />

	{!! Form::close() !!}


@stop