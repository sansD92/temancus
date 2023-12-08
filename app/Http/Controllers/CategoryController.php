<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discussion;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function show($categorySlug) 
   {
    $category = Category::where('slug', $categorySlug)->first();

    if (!$category) {
        return abort(404);
    }

    $discussions = Discussion::with(['user', 'category'])
    ->where('category_id', $category->id)
    ->orderBy('created_at', 'desc')
    ->paginate(3)
    ->withQueryString();

    return response()->view('pages.disscusion.index',[
        'discussions' => $discussions,
        'categories' => Category::all(),
        'withCategory' => $category,
    ]);
   }
}
