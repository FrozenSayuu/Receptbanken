<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();

        return view('recipes/index', [
            'recipes' => $recipes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('recipes/create', ['user' => Auth::user(), 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = new Recipe;

        $recipe->title = request('title');
        $recipe->summary = request('summary');
        $recipe->description = request('description');
        $recipe->cooking_time = request('cooking_time');
        $recipe->ingredients = request('ingredients');
        $recipe->user_id = Auth::user()->id;

        $recipe->save();

        $recipe->categories()->sync($request->categories);

        return redirect('/recipes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('recipes/show', [
            'recipe' => $recipe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe, Category $category)
    {

        $recipe = Recipe::with('categories')->find($recipe->id);

        $categories = Category::all();

        return view('recipes/edit', [
            'recipe' => $recipe,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {

        $validInput = $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'cooking_time' => 'required',
            'ingredients' => 'required',
        ]);

        $recipe->update($validInput);

        $recipe->categories()->sync($request->categories);

        return redirect('/recipes')
            ->with('success', 'Receptet har uppdaterats');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        /*$recipe->delete();

        return redirect()
            ->route('recipes.index')
            ->with('success', 'Receptet är borttaget');*/
    }
}
