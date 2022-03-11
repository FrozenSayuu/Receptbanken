@extends('layouts.app')
@section('content')
<article>
    <h2>Recept på {{$recipe->title}}</h2>
    <p id="cooking_time">Tillagningstid: {{$recipe->cooking_time}}</p>
    <p>Ingredienser:</p>
    <p>{{$recipe->ingredients}}</p>
    <br>
    <p><strong>Gör såhär:</strong></p>
    <p>{{$recipe->description}}</p>
    @foreach($recipe->categories as $category)
        <span>{{$category->title}}</span>
    @endforeach
    <p id="cooking_time">Tillagningstid: {{$recipe->cooking_time}}</p>
    <p>Receptet skapat av: {{$recipe->user->name}}</p>
</article>
@endsection