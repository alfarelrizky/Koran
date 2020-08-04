<?php

namespace App\Http\Controllers;

use App\category;
use App\news;
use App\tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function filter(category $sample)
    {
        $list_category = category::limit(10)->get();
        $populer = news::limit(3)->where('file-type', 'gambar')->orderby('viewer', 'desc')->get();
        // mode
        $kategori = $sample->NamaKategori;
        // getdata tag
        $all_tag = tag::limit(15)->get();
        // halaman
        $populer = news::limit(9)->where('file-type', 'gambar')->where('category_id', $sample->id)->orderby('created_at', 'desc')->orderby('viewer', 'desc')->get();
        $terbaru = news::limit(4)->where('file-type', 'gambar')->where('category_id', $sample->id)->orderby('created_at', 'desc')->orderby('updated_at', 'desc')->get();
        $video   = news::limit(9)->where('file-type', 'video')->where('category_id', $sample->category_id)->orderby('created_at', 'desc')->orderby('viewer', 'desc')->get();
        

        $data = news::where('category_id', $sample->id)->where('file-type', 'gambar')->orderby('created_at', 'desc')->paginate(10);

        return view('news/filter',compact('all_tag','data', 'populer', 'terbaru','populer','kategori','video','list_category'));
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
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //
    }
}
