@extends('layouts.app')

@section('content')

<div class="container justify-content-center border-bottom pb-5 pt-4 mb-3">
	<div id="recipe-heading">
		<h2>Skapa ett recept!</h2>
		<a href="/categories/create" id="btn-text" class="btn btn-primary">Skapa en ny kategori</a>
		<a href="/ingredients/create" id="btn-text" class="btn btn-primary">Skapa en ny ingrediens</a>
	</div>
</div>

@include('partials/validation_errors')

	<div class="container justify-content-center border-bottom pb-5 pt-4 mb-3">
		<div class="card-body p-5">
			<form method="POST" action="{{ route('recipes.index') }}">
				@csrf

				<div class="mb-3">
					<label for="title" class="form-label pt-3">Titel</label>
					<input type="text" class="form-control" id="title" name="title" required>
                    
                    <label for="summary" class="form-label pt-3">Sammanfattning</label>
					<input type="textarea" class="form-control" id="summary" name="summary" required>

                    <label for="description" class="form-label pt-3">Beskrivning</label>
					<textarea rows="5" class="form-control" id="description" name="description" required></textarea>

                    <label for="cooking_time" class="form-label pt-3">Tillagningstid</label>
					<input type="text" class="form-control" id="cooking_time" name="cooking_time" required>
                    
					<h3 class="pt-3">Lägg till ingredienser!</h3>
					<select class="form-select" name="ingredients[]" multiple="multiple">
						@foreach($ingredient as $ingredient)
							<option value="{{ $ingredient->id }}">{{ $ingredient->title }}</option>
						@endforeach
					</select>

                    <h3 class="pt-3">Kategorisera ditt recept!</h3>
					<select class="form-select" name="categories[]" multiple="multiple">
						@foreach($category as $category)
							<option value="{{ $category->id }}">{{ $category->title }}</option>
						@endforeach
					</select>
				</div>

				<button type="submit" id="btn-text" class="btn btn-primary">Skapa</button>
			</form>
		</div>
	</div>

	<div class="container justify-content-center pb-5 pt-4 mb-3">
		<a href="{{ route('recipes.index') }}" id="btn-text" class="btn btn-primary">&laquo; Tillbaka</a>
	</div>

@endsection