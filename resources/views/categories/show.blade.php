@extends('layouts.app')
@section('content')
<div class="container justify-content-center border-bottom pb-5 pt-4 mb-3">
	<div id="recipe-heading">
        <h2>Alla recept för kategori: {{$category->title}}</h2>
    </div>
</div>    
@foreach($category->recipes as $recipe)
    <div class="container justify-content-center border-bottom pb-5 pt-4 mb-3">
        <article id="recipe-frame" class="form-control p-5">
            <div id="recipe-heading">
                <a href="{{ route('recipes.show', ['recipe' => $recipe]) }}" class="text-decoration-none">
                <h2>{{$recipe->title}}</h2>
                </a>
                <a href="{{ route('recipes.show', ['recipe' => $recipe]) }}" id="btn-text" class="btn btn-primary btn-sm">Till receptet</a>
            </div>
            <p>{{$recipe->summary}}</p>
            <div class="nav">
                <div>
                    @foreach($recipe->categories as $category)
                        <a class="btn btn-sm me-3" style="background-color:{{$category->color}};">
                            <span style="color:whitesmoke;">{{$category->title}}</span>
                        </a>
                    @endforeach
                </div>
                <p class="small pt-1">Tillagningstid: {{$recipe->cooking_time}}</p>
            </div>
        </article>
    </div>
@endforeach
@endsection