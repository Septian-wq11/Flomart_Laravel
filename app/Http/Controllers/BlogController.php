<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
{
    $query = Blog::query();

    if ($request->kategori && $request->kategori != 'All') {

        $query->where(
            'kategori',
            $request->kategori
        );
    }

    $blog = $query
        ->latest()
        ->paginate(6);

    $artikelPopuler = Blog::latest()
        ->take(3)
        ->get();

    return view(
        'blog.index',
        compact(
            'blog',
            'artikelPopuler'
        )
    );
}

    public function detail($id)
    {
        $blog = Blog::findOrFail($id);

        return view(
            'blog.detail',
            compact('blog')
        );
    }
}