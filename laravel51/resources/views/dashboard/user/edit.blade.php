@extends ('layout.main')

@section('header-title')

	{{ $user->first_name }} {{ $user->last_name }}
	<a class="button" href="{{ route('dashboard.users') }}">liste des inscrits</a>
	

@stop

@section('content')

	{!! Form::model($user, 
		[
			'route' => ['user.update', $user->id],
			'method' => 'put',
			'id' => 'survey',
			'class' => 'survey',
			'data-parsley-validate' => ''
		]) 
	!!}

		{!! csrf_field() !!}

		<div class="form-errors">
			<div class="bs-callout bs-callout-warning hidden">
				<h4>Oooops!</h4>
				<p>Vos coordonnées semblent être invalide :(</p>
			</div>
			<div class="bs-callout bs-callout-info hidden">
				<h4>Yay!</h4>
				<p>Tout vos coordonnées semblent être ok :)</p>
			</div>
			@if (count($errors) > 0)
			    <div class="bs-callout bs-callout-warning">
		            @foreach ($errors->all() as $error)
		                <p>{{ $error }}</p>
		            @endforeach
			    </div>
			@endif
		</div>	

		<section class="coordonates">
			<h2>coordonnées</h2>
			{!! Form::text('last_name',null,
				[
					'id' => 'last_name',
					'class' => 'u-full-width',
					'placeholder' => 'Nom',
					'required' => ''
				]) 
			!!}
			{!! Form::text('first_name',null,
				[
					'id' => 'first_name',
					'class' => 'u-full-width',
					'placeholder' => 'Prénom',
					'required' => ''
				]) 
			!!}
			{!! Form::email('email',null,
				[
					'id' => 'email',
					'class' => 'u-full-width',
					'placeholder' => 'E-mail',
					'required' => ''
				]) 
			!!}
			{!! Form::text('mobile',null,
				[
					'id' => 'mobile',
					'class' => 'u-full-width',
					'placeholder' => 'Mobile',
					'pattern' => '[0-9]{10}',
					'required' => ''
				]) 
			!!}
			{!! Form::text('firm',null,
				[
					'id' => 'firm',
					'class' => 'u-full-width',
					'placeholder' => 'Entreprise',
					'required' => ''
				]) 
			!!}

		</section>
		<!-- /section.coordonates -->

		<section class="sector">

			<h2>secteur d'activité</h2>

			<div class="row">
				<div class="four columns">
					<p class="label">Restauration Commerciale</p>
					<input type="radio" name="sector" id="commercial" value="Restauration Commerciale" {{ $user->sector == 'Restauration Commerciale' ? 'checked' : '' }}>
					<label for="commercial"><span></span></label>
				</div>
				<div class="four columns">
					<p class="label">Boulangerie-Patisserie</p>
					<input type="radio" name="sector" id="baker" value="Boulangerie-Patisserie" {{ $user->sector == 'Boulangerie-Patisserie' ? 'checked' : '' }}>
					<label for="baker"><span></span></label>
				</div>
				<div class="four columns">
					<p class="label">Distributeurs-Grossistes</p>
					<input type="radio" name="sector" id="wholesaler" value="Distributeurs-Grossistes" {{ $user->sector == 'Distributeurs-Grossistes' ? 'checked' : '' }}>
					<label for="wholesaler"><span></span></label>
				</div>
			</div>

			<div class="row">
				<div class="four columns">
					<p class="label">Fabricants de matériel</p>
					<input type="radio" name="sector" id="maker" value="Fabricants de matériel" {{ $user->sector == 'Fabricants de matériel' ? 'checked' : '' }}>
					<label for="maker"><span></span></label>
				</div>
				<div class="four columns">
					<p class="label">Industrie Agro-alimentaire</p>
					<input type="radio" name="sector" id="agro" value="Industrie Agro-alimentaire" {{ $user->sector == 'Industrie Agro-alimentaire' ? 'checked' : '' }}>
					<label for="agro"><span></span></label>
				</div>
				<div class="four columns">
					<p class="label">Métiers de bouche</p>
					<input type="radio" name="sector" id="bouche" value="Métiers de bouche" {{ $user->sector == 'Métiers de bouche' ? 'checked' : '' }}>
					<label for="bouche"><span></span></label>
				</div>
			</div>

			<div class="row">
				<div class="four columns">
					<p class="label">Restauration collective</p>
					<input type="radio" name="sector" id="collective" value="Restauration collective" {{ $user->sector == 'Restauration collective' ? 'checked' : '' }}>
					<label for="collective"><span></span></label>
				</div>
				<div class="four columns">
					<p class="label">Autres (précisez)</p>
					<input type="radio" name="sector" id="other" value="Autres (précisez)" {{ $user->sector == 'Autres (précisez)' ? 'checked' : '' }}>
					<label for="other"><span></span></label>
				</div>
				<div class="four columns">
					<input type="text" name="sector" id="sector" disabled value="{{ $user->sector }}">
				</div>
			</div>
			
		</section>
		<!-- /section.sector -->

		<section class="questions">

			<div class="row">
				<div class="teen columns">
					<p class="label">Souhaiter-vous rencontrer l'un de nos représentans sur le salon ?*</p>
					<span class="description">
						*Si oui, nous prendrons rendez-vous préalablement avec vous par téléphone.
					</span>
				</div>
				<div class="two columns answers">
					<input type="radio" name="question_one" id="question_one_yes" value="oui" {{ $user->question_one == 'oui' ? 'checked' : '' }}>
					<label for="question_one_yes"><span>oui</span></label>
					<input type="radio" name="question_one" id="question_one_non" value="non" {{ $user->question_one == 'non' ? 'checked' : '' }}>
					<label for="question_one_non"><span>non</span></label>
				</div>
			</div>

			<div class="row">
				<div class="teen columns">
					<p class="label">Souhaiter-vous recevoir de la documentation sur nos solutions ?</p>
				</div>
				<div class="two columns answers">
					<input type="radio" name="question_two" id="question_two_yes" value="oui" {{ $user->question_two == 'oui' ? 'checked' : '' }}>
					<label for="question_two_yes"><span>oui</span></label>
					<input type="radio" name="question_two" id="question_two_non" value="non" {{ $user->question_two == 'non' ? 'checked' : '' }}>
					<label for="question_two_non"><span>non</span></label>
				</div>
			</div>

			<div class="row">
				<div class="twelve columns">
					<label for="question_two_other" class="label">Si OUI, pourriez-vous préciser vos besoins ?</label>
					<textarea class="u-full-width" name="question_two" id="question_two_other" rows="4" disabled>{{ $user->question_two }}</textarea>
				</div>
			</div>

			<div class="row">
				<div class="teen columns">
					<p class="label">Souhaiter-vous participer à un de nos ateliers Barista ?</p>
				</div>
				<div class="two columns answers">
					<input type="radio" name="question_three" id="question_three_yes" value="oui" {{ $user->question_three == 'oui' ? 'checked' : '' }}>
					<label for="question_three_yes"><span>oui</span></label>
					<input type="radio" name="question_three" id="question_three_non" value="non" {{ $user->question_three == 'non' ? 'checked' : '' }}>
					<label for="question_three_non"><span>non</span></label>
				</div>
			</div>

			<div class="row">
				<label for="favorite_slot" class="label">
					Merci d'indiquer un créneau préféré
				</label>
				<div class="input-group">
					<input type="text" name="favorite_slot" id="favorite_slot" value="{{ $user->favorite_slot }}">
					<img src="{{ asset('img/icon-1.png') }}" alt="icon" class="icon">
				</div>
			</div>

			<div class="row">
				<input type="submit">
			</div>

		</section>
		<!-- /section.questions -->

		<section class="ads">
			<img src="{{ asset('img/ads.png') }}" alt="ads">
		</section>
		<!-- /section.ads -->

	{!! Form::close() !!}

@stop