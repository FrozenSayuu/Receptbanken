<h1>Lista över recept</h1>

@foreach ($recipes as $recipe)
    <div>
        {{$recipe->title}}
        <a href="{{ route('recipes.show', ['recipe' => $recipe]) }}" class="btn btn-warning">se recept</a>
    </div>
@endforeach

   