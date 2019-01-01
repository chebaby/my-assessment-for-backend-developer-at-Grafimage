@extends ('layout.main')

@section('header-title', 'Afin de mieux vous accueillir sur notre stand, nous vous remercions de bien vouloir renseigner ce questionnaire.')

@section('content')

	<form action="{{ route('user.store') }}" method="POST" accept-charset="utf-8" id="survey" class="survey" data-parsley-validate="">

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
			<input type="text" name="last_name" id="last_name" class="u-full-width" placeholder="Nom" required="" value="{{ old('last_name') }}">
			<input type="text" name="first_name" id="first_name" class="u-full-width" placeholder="Prénom" required="" value="{{ old('first_name') }}">
			<input type="email" name="email" id="email" class="u-full-width" placeholder="E-mail" required="" value="{{ old('email') }}">
			<input type="tel" name="mobile" pattern="[0-9]{10}" id="mobile" class="u-full-width" placeholder="Mobile" required="" value="{{ old('mobile') }}">
			<input type="text" name="firm" id="firm" class="u-full-width" placeholder="Entreprise" required="" value="{{ old('firm') }}">

		</section>
		<!-- /section.coordonates -->

		<section class="sector">

			<h2>secteur d'activité</h2>

			<div class="row">
				<div class="four columns">
					<p class="label">Restauration Commerciale</p>
					<input type="radio" name="sector" id="commercial" value="Restauration Commerciale" {{ old('sector') == 'Restauration Commerciale' ? 'checked' : '' }}>
					<label for="commercial"><span></span></label>
				</div>
				<div class="four columns">
					<p class="label">Boulangerie-Patisserie</p>
					<input type="radio" name="sector" id="baker" value="Boulangerie-Patisserie" {{ old('sector') == 'Boulangerie-Patisserie' ? 'checked' : '' }}>
					<label for="baker"><span></span></label>
				</div>
				<div class="four columns">
					<p class="label">Distributeurs-Grossistes</p>
					<input type="radio" name="sector" id="wholesaler" value="Distributeurs-Grossistes" {{ old('sector') == 'Distributeurs-Grossistes' ? 'checked' : '' }}>
					<label for="wholesaler"><span></span></label>
				</div>
			</div>

			<div class="row">
				<div class="four columns">
					<p class="label">Fabricants de matériel</p>
					<input type="radio" name="sector" id="maker" value="Fabricants de matériel" {{ old('sector') == 'Fabricants de matériel' ? 'checked' : '' }}>
					<label for="maker"><span></span></label>
				</div>
				<div class="four columns">
					<p class="label">Industrie Agro-alimentaire</p>
					<input type="radio" name="sector" id="agro" value="Industrie Agro-alimentaire" {{ old('sector') == 'Industrie Agro-alimentaire' ? 'checked' : '' }}>
					<label for="agro"><span></span></label>
				</div>
				<div class="four columns">
					<p class="label">Métiers de bouche</p>
					<input type="radio" name="sector" id="bouche" value="Métiers de bouche" {{ old('sector') == 'Métiers de bouche' ? 'checked' : '' }}>
					<label for="bouche"><span></span></label>
				</div>
			</div>

			<div class="row">
				<div class="four columns">
					<p class="label">Restauration collective</p>
					<input type="radio" name="sector" id="collective" value="Restauration collective" {{ old('sector') == 'Restauration collective' ? 'checked' : '' }}>
					<label for="collective"><span></span></label>
				</div>
				<div class="four columns">
					<p class="label">Autres (précisez)</p>
					<input type="radio" name="sector" id="other" value="Autres (précisez)" {{ old('sector') == 'Autres (précisez)' ? 'checked' : '' }}>
					<label for="other"><span></span></label>
				</div>
				<div class="four columns">
					<input type="text" name="sector" id="sector" disabled value="{{ old('sector') }}">
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
					<input type="radio" name="question_one" id="question_one_yes" value="oui" {{ old('question_one') == 'oui' ? 'checked' : '' }}>
					<label for="question_one_yes"><span>oui</span></label>
					<input type="radio" name="question_one" id="question_one_non" value="non" {{ old('question_one') == 'non' ? 'checked' : '' }}>
					<label for="question_one_non"><span>non</span></label>
				</div>
			</div>

			<div class="row">
				<div class="teen columns">
					<p class="label">Souhaiter-vous recevoir de la documentation sur nos solutions ?</p>
				</div>
				<div class="two columns answers">
					<input type="radio" name="question_two" id="question_two_yes" value="oui" {{ old('question_two') == 'oui' ? 'checked' : '' }}>
					<label for="question_two_yes"><span>oui</span></label>
					<input type="radio" name="question_two" id="question_two_non" value="non" {{ old('question_two') == 'non' ? 'checked' : '' }}>
					<label for="question_two_non"><span>non</span></label>
				</div>
			</div>

			<div class="row">
				<div class="twelve columns">
					<label for="question_two_other" class="label">Si OUI, pourriez-vous préciser vos besoins ?</label>
					<textarea class="u-full-width" name="question_two" id="question_two_other" rows="4" disabled>{{ old('question_two') }}</textarea>
				</div>
			</div>

			<div class="row">
				<div class="teen columns">
					<p class="label">Souhaiter-vous participer à un de nos ateliers Barista ?</p>
				</div>
				<div class="two columns answers">
					<input type="radio" name="question_three" id="question_three_yes" value="oui" {{ old('question_three') == 'oui' ? 'checked' : '' }}>
					<label for="question_three_yes"><span>oui</span></label>
					<input type="radio" name="question_three" id="question_three_non" value="non" {{ old('question_three') == 'non' ? 'checked' : '' }}>
					<label for="question_three_non"><span>non</span></label>
				</div>
			</div>

			<div class="row">
				<label for="favorite_slot" class="label">
					Merci d'indiquer un créneau préféré
				</label>
				<div class="input-group">
					<input type="text" name="favorite_slot" id="favorite_slot" value="{{ old('favorite_slot') }}">
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

	</form>

@stop