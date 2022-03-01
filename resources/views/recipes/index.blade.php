@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between align-items-center my-3">
    <h2>Your created recipes!</h2>
    <a href="recipes/create" class="btn btn-primary">Create a new recipe</a>
  </div>

@foreach ($recipes as $recipe)
    @if($recipe->user == auth()->user())
        <article>
            <h3>{{$recipe->title}}</h3>
            <p>{{$recipe->summary}}</p>
            <p class="cooking_time">{{$recipe->cooking_time}}</p>
            <!-- <span>{/*{$recipe->category}}</span> -->
        </article>
        <a href="/recipes/{{ $recipe->id }}/show" class="btn btn-primary btn-sm">View</a>
        <a href="/recipies/{{$recipe->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
        <form class="d-inline-block" method="POST" action="/recipes/{{ $recipe->id }}/{{ route('recipes.destroy', ['recipe' => $recipe]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger confirm btn-sm">Delete recipe</button>
        </form>
    @endif
@endforeach

@endsection