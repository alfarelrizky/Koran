<?php

namespace App\Http\Controllers;

use App\category;
use App\news;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // halaman
        $data_jumbotron = news::limit(5)->where('file-type','gambar')->orderby('updated_at', 'asc')->get();
        $terbaru = news::limit(5)->where('file-type','gambar')->orderby('created_at','asc')->get();
        $trending = news::limit(10)->where('file-type','gambar')->orderby('viewer','asc')->get();
        return view('news/index',compact('data_jumbotron','trending','terbaru','category'));
    }

    public function detail(news $sample)
    {
        // halaman
        $sample->category;
        $detail = $sample;
        $view_old = $sample->viewer;
        $tampung['viewer'] = $view_old + 1;
        $sample->update($tampung);

        $populer = news::limit(9)->where('file-type', 'gambar')->where('category_id', $sample->category_id)->orderby('viewer', 'asc')->get();
        $terbaru = news::limit(4)->where('file-type', 'gambar')->where('category_id', $sample->category_id)->orderby('viewer', 'asc')->orderby('updated_at', 'asc')->get();
        
        return view('news/detail',compact('detail','populer','terbaru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function show(news $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(news $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, news $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(news $news)
    {
        //
    }
}
