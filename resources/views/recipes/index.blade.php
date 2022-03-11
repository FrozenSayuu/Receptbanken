@extends('layouts.app')
@section('content')

<div class="container justify-content-center border-bottom pb-5 pt-4 mb-3">
    @if (count($recipes) > 0)
        <div id="recipe-heading">
            <h2>Dina skapade recept!</h2>
            <a href="recipes/create" class="btn btn-primary">Skapa ett nytt recept</a>
        </div>
  </div>

  @include('partials/status')
  
  @foreach ($recipes as $recipe)
      @if($recipe->user == auth()->user())
        <div class="container justify-content-center border-bottom pb-5 pt-4 mb-3">
            <article id="recipe-frame" class="form-control p-5">
                <div id="recipe-heading">
                    <a href="{{ route('recipes.show', ['recipe' => $recipe]) }}" class="text-decoration-none">
                        <h3>{{$recipe->title}}</h3>
                    </a>
                    <a href="{{ route('recipes.show', ['recipe' => $recipe]) }}" class="btn btn-primary btn-sm">Till receptet</a>
                </div>
                <p>{{$recipe->summary}}</p>
                <div class="nav pb-5">
                    <div>
                        @foreach($recipe->categories as $category)
                            <a class="btn btn-sm me-3" style="background-color:{{$category->color}};">
                                <span style="color:whitesmoke;">{{$category->title}}</span>
                            </a>
                        @endforeach
                    </div>
                    <p class="small pt-1">Tillagningstid: {{$recipe->cooking_time}}</p>
                </div>
                <a href="recipes/{{$recipe->id}}/edit" class="btn btn-primary btn-sm me-3 mb-2">Redigera</a>
                <form class="d-inline-block" method="POST" action="{{ route('recipes.destroy', ['recipe' => $recipe]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger confirm btn-sm mb-2">Ta bort</button>
                </form>
            </article>
        </div>
      @endif
  @endforeach
    @else
    <div id="recipe-heading">
        <h2>Du har inte skapat några recept!</h2>
        <a href="recipes/create" class="btn btn-primary">Skapa ett nytt recept</a>
    </div>
</div>
@endif
@endsection
