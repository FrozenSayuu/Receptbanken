@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center my-3">
	<h2>Create a recipe!</h2>
	<a href="/categories/create" class="btn btn-primary">Create a new category</a>
</div>

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
                    
                    <h3>Tag your post!</h3>
					<select class="form-select" name="categories[]" multiple="multiple">
						@foreach($category as $category)
							<option value="{{ $category->id }}">{{ $category->title }}</option>
						@endforeach
					</select>
				</div>

				<button type="submit" class="btn btn-success">Create</button>
			</form>
		</div>
	</div>

	<div class="mt-4">
		<a href="{{ route('recipes.index') }}" class="btn btn-secondary">&laquo; Back</a>
	</div>

@endsection