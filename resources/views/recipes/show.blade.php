
<article>
    <h2>Recept på {{$recipe->title}}</h2>
    <p>Tillagningstid: {{$recipe->cooking_time}}</p>
    <ul>Ingredienser:
        <li>{{$recipe->ingredients}}</li>
    </ul>
    <p>Gör såhär</p>
    <p>{{$recipe->description}}</p>
    <p>Receptet skapat av: {{$recipe->user->name}}</p>
</article>