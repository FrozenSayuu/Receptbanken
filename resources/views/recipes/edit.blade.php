@extends('layouts.app')
@section('content')
<div class="container justify-content-center border-bottom pb-5 pt-4 mb-3">
	<h2>Redigera ditt recept!</h2>
</div>

@include('partials/validation_errors')

	<div class="container justify-content-center border-bottom pb-5 pt-4 mb-3">
		<div class="card-body p-5">
            @if($recipe->user == auth()->user())
			    <form method="POST" action="{{route('recipes.update', ['recipe' => $recipe])}}">
				    @csrf
                    @method('PUT')

				    <div class="mb-3">
					    <label for="title" class="form-label pt-3">Titel</label>
					    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?: $recipe->title}}" required>
                    
                        <label for="summary" class="form-label pt-3">Sammanfattning</label>
					    <input type="textarea" class="form-control" id="summary" name="summary" value="{{ old('summary') ?: $recipe->summary}}" required>

                        <label for="description" class="form-label pt-3">Beskrivning</label>
                        <textarea rows="5" class="form-control" id="description" name="description" required>{{ old('description') ?: $recipe->description}}</textarea>

                        <label for="cooking_time" class="form-label pt-3">Tillagningstid</label>
					    <input type="text" class="form-control" id="cooking_time" name="cooking_time" value="{{ old('cooking_time') ?: $recipe->cooking_time}}" required>
                    
                        <label for="ingredients" class="form-label pt-3">Ingredienser</label>
                        <textarea rows="5" class="form-control" id="ingredients" name="ingredients" required>{{ old('ingredients') ?: $recipe->ingredients}}</textarea>

                        <h3 class="pt-3">Kategorisera ditt recept!</h3>
					
                        <select class="form-control" id="categories" name="categories[]" multiple="multiple">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @foreach($recipe->categories as $resCategory)
                                   {{ $resCategory->id==$category->id?'Selected':'' }}
                                @endforeach
                            >{{ $category->title}}</option>
                            @endforeach
                        </select>
                    
				    </div>

				    <button type="submit" class="btn btn-primary">Uppdatera</button>
			    </form>
            @endif
		</div>
	</div>

	<div class="container justify-content-center pb-5 pt-4 mb-3">
		<a href="{{ route('recipes.index') }}" class="btn btn-primary btn-sm">Tillbaka</a>
	</div>
@endsection