@extends('layouts.app')
@section('content')



<div class="container justify-content-center border-bottom pb-5 pt-4 mb-3">
    @if (count($recipes) > 0)
        <div id="recipe-heading">
            <h2>Dina skapade recept!</h2>
            <a href="recipes/create" id="btn-text" class="btn btn-primary">Skapa ett nytt recept</a>
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
                    <a href="{{ route('recipes.show', ['recipe' => $recipe]) }}" id="btn-text" class="btn btn-primary btn-sm">Till receptet</a>
                </div>
                <p>{{$recipe->summary}}</p>
                <div class="nav pb-5">
                    <div>
                        @foreach($recipe->categories as $category)
                            <a href="{{ route('categories.show', ['category' => $category]) }}" class="btn btn-sm me-3" style="background-color:{{$category->color}};">
                                <span style="color:whitesmoke;">{{$category->title}}</span>
                            </a>
                        @endforeach
                    </div>
                    <p class="small pt-1">Tillagningstid: {{$recipe->cooking_time}}</p>
                </div>
                <a href="recipes/{{$recipe->id}}/edit" id="btn-text" class="btn btn-primary btn-sm me-3 mb-2">Redigera</a>
                <a id="btn-text" class="btn btn-danger btn-sm mb-2 deleteBtn" data-id={{$recipe->id}} data-toggle="modal" data-target="#deleteModal">Ta bort</a>
                <!-- Modal pops-up when delete recipe is pressed -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="d-inline-block" method="POST" action="{{ route('recipes.destroy', 'id') }}">
                                @csrf
                                @method('DELETE')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ta bort recept</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input hidden name="id" id="id" value="">
                                        <h5>Vill du verkligen ta bort detta recept?</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nej, ångra</button>
                                        <button type="submit" class="btn btn-danger">Ja, ta bort recept</button>
                                    </div>
                            </form>        
                        </div>
                    </div>
                </div>
            </article>
        </div>
      @endif
  @endforeach
    @else
    <div id="recipe-heading">
        <h2>Du har inte skapat några recept!</h2>
        <a href="recipes/create" id="btn-text" class="btn btn-primary">Skapa ett nytt recept</a>
    </div>
</div>
@endif


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery.js"></script>

@endsection
