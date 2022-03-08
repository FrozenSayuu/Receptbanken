@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between align-items-center my-3">
    @if (count($recipes) > 0)
         <h2>Your created recipes!</h2>
         <a href="recipes/create" class="btn btn-primary">Create a new recipe</a>
  </div>

  @include('partials/status')
  
  @foreach ($recipes as $recipe)
      @if($recipe->user == auth()->user())
          <article>
              <h3>{{$recipe->title}}</h3>
              <p>{{$recipe->summary}}</p>
              <p class="cooking_time">{{$recipe->cooking_time}}</p>
              @foreach($recipe->categories as $category)
                  <a class="btn btn-sm" style="background-color:{{$category->color}};">
                    <span style="color:whitesmoke;">{{$category->title}}</span>
                </a>
              @endforeach
          </article>
          <a href="{{ route('recipes.show', ['recipe' => $recipe]) }}" class="btn btn-primary btn-sm">View</a>
          <a href="recipes/{{$recipe->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
          <form class="d-inline-block" method="POST" action="{{ route('recipes.destroy', ['recipe' => $recipe]) }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger confirm btn-sm">Delete recipe</button>
          </form>
      @endif
  @endforeach
    @else
    <h2>You have no created recipes!</h2>
    <a href="recipes/create" class="btn btn-primary">Create a new recipe</a>
</div>
    @endif

@endsection
