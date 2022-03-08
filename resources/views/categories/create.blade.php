@extends('layouts.app')
@section('content')

<h2>Create a category!</h2>

@include('partials/validation_errors')

	<div class="card">
		<div class="card-body">
			<form method="POST" action="{{ route('categories.index') }}">
				@csrf

				<div class="mb-3">
					<label for="title" class="form-label">Title</label>
					<input type="text" class="form-control" id="title" name="title" required>

					<label for="color" class="form-label">Enter a hex code for color here</label>
					<input type="text" class="form-control" id="color" name="color">
				</div>

				<button type="submit" class="btn btn-success">Create</button>
			</form>
		</div>
	</div>

	<div class="mt-4">
		<a href="recipes/create" class="btn btn-secondary">&laquo; Back</a>
	</div>

@endsection