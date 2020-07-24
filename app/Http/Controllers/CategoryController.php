<?php

namespace App\Http\Controllers;

use App\category;
use App\news;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function filter(category $sample)
    {
        // mode
        $kategori = $sample->NamaKategori;
        // halaman
        $view_old = $sample->viewer;
        $tampung['viewer'] = $view_old + 1;
        $sample->update($tampung);

        $populer = news::limit(9)->where('file-type', 'gambar')->where('category_id', $sample->id)->orderby('viewer', 'asc')->get();
        $terbaru = news::limit(4)->where('file-type', 'gambar')->where('category_id', $sample->id)->orderby('viewer', 'asc')->orderby('updated_at', 'asc')->get();

        $data = news::where('category_id', $sample->id)->paginate(10);

        return view('news/filter',compact('data', 'populer', 'terbaru','kategori'));
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
