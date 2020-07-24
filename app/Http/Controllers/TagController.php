<?php

namespace App\Http\Controllers;

use App\news;
use App\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function filter(tag $sample)
    {
        // mode
        $tag = $sample->NamaTag;

        // getdata news
        $data = $sample->news()->paginate(10);

        // getdata tag
        $all_tag = tag::limit(15)->get();

        // halaman
        $populer = $sample->news_terpopuler()->limit(9)->get();
        $terbaru = $sample->news_terbaru()->limit(4)->get();

        return view('news/filter', compact('all_tag','data', 'populer', 'terbaru', 'tag'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(tag $tag)
    {
        //
    }
}
