<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        $categories = Category::all();
        return view('pages.frontend.home', compact('news', 'categories'));
    }

    public function search(Request $request)
    {
        $cari = $request->cari;
        $news = News::where('title', 'LIKE', "%$cari%")->get();
        $newsAll = News::orderBy('created_at', 'desc')->get();
        $categories = Category::all();
        return view('pages.frontend.search', compact('cari', 'news', 'categories', 'newsAll'));
    }

    public function blogs($category=null)
    {
        $news = News::orderBy('created_at', 'desc')->get();
        if ($category) {
            $news = $news->where('category_id', $category);
        }
        // return $news;
        return view('pages.frontend.blogs', compact('news', 'category'));
    }

    public function detail($id)
    {
        $news = News::find($id);
        return view('pages.frontend.blog', compact('news'));
    }

    public function about()
    {
        return view('pages.frontend.about');
    }
}
