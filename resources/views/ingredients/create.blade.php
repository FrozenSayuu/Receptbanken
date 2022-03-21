@extends('layouts.app')
@section('content')

<div class="container justify-content-center border-bottom pb-5 pt-4 mb-3">
	<h2>Skapa en ingrediens!</h2>
</div>

@include('partials/validation_errors')

	<div class="container justify-content-center border-bottom pb-5 pt-4 mb-3">
		<div class="card-body p-5">
			<form method="POST" action="{{ route('ingredients.index') }}">
				@csrf

				<div class="mb-3">
					<label for="title" class="form-label pt-3">Ingrediens
                    </label>
					<input type="text" class="form-control" id="title" name="title" required>

				</div>

				<button type="submit" id="btn-text" class="btn btn-primary">Skapa</button>
			</form>
		</div>
	</div>

	<div class="container justify-content-center pb-5 pt-4 mb-3">
		<a href="/recipes/create" id="btn-text" class="btn btn-primary">&laquo; Tillbaka</a>
	</div>

@endsection