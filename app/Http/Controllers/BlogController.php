<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog()
    {
        $blogs = Blog::all();

        return view('blog.index', [
            'blogs' => $blogs,
        ]);
    }
    public function blogDetalle(int $id)
    {
        $blog = Blog::findOrFail($id);

        return view('blog.detalle', [
            'blog' => $blog,
        ]);
    }

    public function index()
    {
        $blogs = Blog::with(['etiquetas'])->get();

        return view('blog.index', [
            'blogs' => $blogs,
        ]);
    }
}