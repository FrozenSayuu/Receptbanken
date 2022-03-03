<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class FrontpageController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();

        return view('frontpage', [
            'recipes' => $recipes
        ]);
    }
}
