<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        // return $news->author;
        return view('pages.news.index', compact('news'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'content'   => 'required',
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            Storage::putFileAs(
                'public', $request->file('image'), $imageName
            );
        } else {
            $imageName = 'default.png';
        }

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
        ]);
            
        return redirect()->route('berita.index')->with('message', 'Berita berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        $categories = Category::all();
        return view('pages.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::find($id);
        $request->validate([
            'title'     => 'required',
            'content'   => 'required',
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            Storage::putFileAs(
                'public', $request->file('image'), $imageName
            );
            if ($news->image != 'default.png') {
                Storage::delete("public/$news->image");
            }
        } else {
            $imageName = $news->image;
        }

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('berita.index')->with('message', 'Berita berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        if ($news->image != 'default.png') {
            Storage::delete("public/$news->image");
        }
        $news->delete();
        return redirect()->route('berita.index')->with('message', 'Berita berhasil dihapus!');
    }
}
