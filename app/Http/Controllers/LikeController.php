<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LikeController extends Controller
{
 
    public function discussionLike(string $discussionlug)
    {
        $discussions = Discussion::where('slug', $discussionlug)->first();
        $discussions->like();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' => $discussions->likeCount,
            ],
        ]);
    }

    public function discussionUnLike(string $discussionlug)
    {
        $discussions = Discussion::where('slug', $discussionlug)->first();
        $discussions->unlike();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' => $discussions->likeCount,
            ],
        ]);
    }
}
