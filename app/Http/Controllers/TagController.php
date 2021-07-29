<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($slug){

        $tag = Tag::where('slug', $slug)->firstOrFail();

        $posts = $tag->posts()->with('category')->orderBy('id', 'desc')->paginate(2);

        return view('tags.show',[
            'tag' => $tag,
            'posts' => $posts,
        ]);
    }
}
