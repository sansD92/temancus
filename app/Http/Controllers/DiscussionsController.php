<?php

namespace App\Http\Controllers;

use Str;
use App\Models\Category;
use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Http\Requests\Discussion\StoreRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiscussionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //eager load relationship
        $discussions = Discussion::with('user', 'category');
        return response()->view('pages.disscusion.index', [
            'discussions' => $discussions->orderBy('created_at', 'desc')
            ->paginate(3),
            'categories' => Category::all(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('pages.disscusion.form', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $categoryId = Category::where('slug', $validated['category_slug'])->first()->id;

        $validated['category_id'] = $categoryId;
        $validated['user_id'] = auth()->id();
        $validated['slug'] = Str::slug($validated['title']) . '-' .time();

        $stripContent = strip_tags($validated['content']);
        $isContentLong = strlen($stripContent) > 120;
        $validated['content_preview'] = $isContentLong
        ? (substr($stripContent, 0, 120) . '...') : $stripContent;

        $create = Discussion::create($validated);

        if ($create) {
            session()->flash('notif.success', 'Discussion Created Successfully');
            return redirect()->route('discussions.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        //berdasarkan slug dan eager load user dan category

        $discussions = Discussion::with('user', 'category')->where('slug', $slug)->first();

        $notLikedImage = url('assets/images/like.png');
        $likedImage = url('assets/images/liked.png');

        return response()->view('pages.disscusion.show', [
        'discussions' => $discussions,
        'categories' => Category::all(),
        'likedImage' => $likedImage,
        'notLikedImage' => $notLikedImage,
    ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
