@extends('layouts.app')
@section('content')
<article>
    <h2>Recept på {{$recipe->title}}</h2>
    <p id="cooking_time">Tillagningstid: {{$recipe->cooking_time}}</p>
    <p>Ingredienser:</p>
    @foreach($recipe->ingredients as $ingredient)
        <p>{{$ingredient->title}}</p>
    @endforeach
    <div id="br"></div>
    <p>Gör såhär:</p>
    <p>{{$recipe->description}}</p>
    @foreach($recipe->categories as $category)
        <span>{{$category->title}}</span>
    @endforeach
    <p id="cooking_time">Tillagningstid: {{$recipe->cooking_time}}</p>
    <p>Receptet skapat av: {{$recipe->user->name}}</p>
</article>
@endsection