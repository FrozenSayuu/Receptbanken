
@extends('layouts.app')
@section('content')

@if (count($recipes) > 0)
    @foreach ($recipes as $recipe)
    <article>
        <h2>{{$recipe->title}}</h2>
        <p>{{$recipe->summary}}</p>
        <p class="small">Tillagningstid: {{$recipe->cooking_time}}</p>
        <div>
        @foreach($recipe->categories as $category)
            <span>{{$category->title}}</span>
        @endforeach
        </div>
        <a href="{{ route('recipes.show', ['recipe' => $recipe]) }}" class="btn btn-primary btn-sm">Till receptet</a>
    </article>
    <br>

    @endforeach

@else
    <h2>No recipes created!</h2>
    <p>Login or register to create some!</p>
@endif

@endsection