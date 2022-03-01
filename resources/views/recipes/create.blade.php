@extends('layouts.app')

@section('content')

<h2>Create a recipe!</h2>

@include('partials/validation_errors')

	<div class="card">
		<div class="card-body">
			<form method="POST" action="{{ route('recipes.index') }}">
				@csrf

				<div class="mb-3">
					<label for="title" class="form-label">Title</label>
					<input type="text" class="form-control" id="title" name="title" required>
                    
                    <label for="summary" class="form-label">Summary</label>
					<input type="textarea" class="form-control" id="summary" name="summary" required>

                    <label for="description" class="form-label">Description</label>
					<input type="textarea" class="form-control" id="description" name="description" required>

                    <label for="cooking_time" class="form-label">Cooking Time</label>
					<input type="text" class="form-control" id="cooking_time" name="cooking_time" required>
                    
                    <label for="ingredients" class="form-label">Ingredients</label>
					<input type="textarea" class="form-control" id="ingredients" name="ingredients" required>
                    
                    <label for="category" class="form-label">Category</label>
					<input type="text" class="form-control" id="category" name="category" required>
				</div>

				<button type="submit" class="btn btn-success">Create</button>
			</form>
		</div>
	</div>

	<div class="mt-4">
		<a href="{{ route('recipes.index') }}" class="btn btn-secondary">&laquo; Back</a>
	</div>

@endsection