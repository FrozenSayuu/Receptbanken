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
          <td class="col">
            <button type="button" data-url="{{ route('recipes.destroy', $recipe->id) }}" class="btn btn-danger btn-sm float-right" title="Delete">
                 <i class="fa fa-times">Delete</i>
            </button> 
         </td>
      @endif
  @endforeach
    @else
    <h2>You have no created recipes!</h2>
    <a href="recipes/create" class="btn btn-primary">Create a new recipe</a>
</div>
@endif
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click', '.btn-danger', function (e) {
    e.preventDefault();
    var url = $(this).data('url');
    var token = "{{ csrf_token() }}";
    swal({
            title: "Are you sure!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        },
        function() {
            $.ajax({
                type: "POST",
                url: url,
                data: {_token: token, _method: 'DELETE'},
                success: function (data) {
                     //
                }         
            });
    });
});
</script>
@endsection
