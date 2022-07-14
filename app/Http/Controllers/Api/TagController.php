<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($slug) {
        $tag = Tag::with(['posts'])->where('slug', '=', $slug)->first();
        if ($tag) {
            return response()->json([
                'success' => true,
                'results' => $tag
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'No Tag Found'
        ]);
    }
}
