<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->paginate(3);
        $sidebar_news = News::where('display', 1)->get();
        // dd($news->getOptions());
        //danh muc,
        return view('news.index',[
            'news' => $news,
            'sidebar_news' => $sidebar_news,
        ]);
    }
    public function newsDetail(Request $request){
        //Request $request $news = News::all()->find($request->id);
        return view('news.news_detail');
        // ,[
        //     'news' => $news,
        // ]
    // );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}
