@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center my-3">
	<h2>Redigera ditt recept!</h2>
</div>

@include('partials/validation_errors')

	<div class="card">
		<div class="card-body">
			<form method="POST" action="{{route('recipes.update', ['recipe' => $recipe])}}">
				@csrf
                @method('PUT')

				<div class="mb-3">
					<label for="title" class="form-label">Title</label>
					<input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?: $recipe->title}}" required>
                    
                    <label for="summary" class="form-label">Summary</label>
					<input type="textarea" class="form-control" id="summary" name="summary" value="{{ old('summary') ?: $recipe->summary}}" required>

                    <label for="description" class="form-label">Description</label>
					<input type="textarea" class="form-control" id="description" name="description" value="{{ old('description') ?: $recipe->description}}" required>

                    <label for="cooking_time" class="form-label">Cooking Time</label>
					<input type="text" class="form-control" id="cooking_time" name="cooking_time" value="{{ old('cooking_time') ?: $recipe->cooking_time}}" required>
                    
                    <label for="ingredients" class="form-label">Ingredients</label>
					<input type="textarea" class="form-control" id="ingredients" name="ingredients" value="{{ old('ingredients') ?: $recipe->ingredients}}" required>
                    
                    {{-- lägg till för att ändra category --}}
				</div>

				<button type="submit" class="btn btn-success">Uppdatera</button>
			</form>
		</div>
	</div>

	<div class="mt-4">
		<a href="{{ route('recipes.index') }}" class="btn btn-primary btn-sm">Tillbaka</a>
	</div>
@endsection