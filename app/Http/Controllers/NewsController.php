<?php

namespace App\Http\Controllers;

use App\category;
use App\news;
use App\tag;
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
        $data_jumbotron = news::limit(5)->where('file-type','gambar')->orderby('created_at', 'desc')->orderby('updated_at', 'desc')->get();
        $terbaru = news::limit(5)->where('file-type','gambar')->orderby('created_at', 'desc')->orderby('created_at','desc')->get();
        $trending = news::limit(10)->where('file-type','gambar')->orderby('created_at', 'desc')->orderby('viewer','desc')->get();
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

        // getdata tag
        $all_tag = tag::limit(15)->get();

        $populer = news::limit(9)->where('file-type', 'gambar')->where('category_id', $sample->category_id)->orderby('created_at', 'desc')->orderby('viewer', 'desc')->get();
        $terbaru = news::limit(4)->where('file-type', 'gambar')->where('category_id', $sample->category_id)->orderby('created_at', 'desc')->orderby('updated_at', 'desc')->get();
        
        return view('news/detail',compact('all_tag','detail','populer','terbaru'));
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
