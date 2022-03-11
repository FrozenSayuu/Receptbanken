@extends('layouts.app')
@section('content')

<div class="container justify-content-center border-bottom pb-5 pt-4 mb-3">
	<h2>Skapa en kategori!</h2>
</div>

@include('partials/validation_errors')

	<div class="container justify-content-center border-bottom pb-5 pt-4 mb-3">
		<div class="card-body p-5">
			<form method="POST" action="{{ route('categories.index') }}">
				@csrf

				<div class="mb-3">
					<label for="title" class="form-label pt-3">Titel</label>
					<input type="text" class="form-control" id="title" name="title" required>

					<label for="color" class="form-label pt-3">Fyll i en hex-kod för önskad färg</label>
					<input type="text" class="form-control" id="color" name="color">
				</div>

				<button type="submit" id="btn-text" class="btn btn-primary">Skapa</button>
			</form>
		</div>
	</div>

	<div class="container justify-content-center pb-5 pt-4 mb-3">
		<a href="/recipes/create" id="btn-text" class="btn btn-primary">&laquo; Tillbaka</a>
	</div>

@endsection