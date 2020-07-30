<?php

namespace App\Http\Controllers;

use App\administrator;
use App\category;
use App\media;
use App\news;
use App\tag;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    // berita
    public function validasi()
    {
        if (request()->gambar) {
            request()->validate([
                'title' => 'required',
                'content' => 'required',
                'file-type' => 'required',
                'gambar' => 'image|mimes:jpg,jpeg,png|max:10000',
                'editor' => 'required',
                'category_id' => 'required',
                'media_id' => 'required',
            ]);
        } elseif (request()->video) {
            request()->validate([
                'title' => 'required',
                'content' => 'required',
                'file-type' => 'required',
                'video' => 'required|min:3',
                'editor' => 'required',
                'category_id' => 'required',
                'media_id' => 'required',
            ]);
        }
    }

    public function index()
    {
        return view('admin/index');
    }

    public function tambah_berita()
    {
        $this->validasi();
        $tampung = request()->all();
        if (request()->gambar) {
            $gambar     = request()->file('gambar');
            $slug       = \Str::slug(request()->title);
            $gambar_url = $gambar->storeAS('images/news',"{$slug}.{$gambar->extension()}");
            $tampung['file'] = $gambar_url; 
            $tampung['file-type'] = 'gambar'; 
        }elseif (request()->video) {
            $tampung['file'] = request()->video;
            $tampung['file-type'] = 'video'; 
        }
        $tampung['viewer'] = 0;
        $temp = news::create($tampung);
        $temp->tag()->attach(request()->tag);
        return $temp;
    }

    public function route_edit_berita(news $sample)
    {
        $sample->media;
        $sample->tag;
        $sample->category;
        return $sample;
    }

    public function edit_berita(news $sample)
    {
        $new_data = request()->all();

        if (request()->gambar) {
            if ($sample->gambar == request()->gambar) {
                $new_data['file'] = request()->gambar;
                $new_data['file-type'] = 'gambar'; 
            } else {
                $file = request()->gambar;
                $slug = \Str::slug(request()->title);
                $url  = $file->storeAS('images/news',"{$slug}.{$file->extension()}");
                $new_data['file'] = $url;
                $new_data['file-type'] = 'gambar'; 
            }
        } elseif (request()->video) {
            $new_data['file'] = request()->video;
            $new_data['file-type'] = 'video'; 
        }

        $sample->update($new_data);
        $sample->tag()->sync(request()->tag);
        return response()->json([
            'success' => true,
        ]);
    }

    public function list_berita()
    {
        $data_category = category::get();
        $data_tag = tag::get();
        $data_media = media::get();
        return view('admin/list_berita',compact('data_category','data_media','data_tag'));
    }

    public function list_berita_api()
    {
        $list_berita = news::with('media')->get();
        if (request()->ajax()) {
            return DataTables()->of($list_berita)
                ->addColumn('tombol_aksi',function($list_berita){
                    $table  = "<a href='".route('news.detail',$list_berita->id)."' target='_blank'><button class='btn btn-primary btn-sm m-1'><i class='tim-icons icon-bulb-63'></i></button></a>";
                    $table .= "<button id class='btn btn-success btn-sm m-1' onclick='editberita(" . $list_berita->id . ")' data-toggle='modal' data-target='#exampleModal'><i class='tim-icons icon-pencil'></i></button>";
                    $table .= "<button class='btn btn-danger btn-sm m-1' onclick='hapusberita(".$list_berita->id.")'><i class='tim-icons icon-trash-simple'></i></button>";

                    return $table;
                })
                ->rawColumns(['tombol_aksi'])
                ->make(true);
        }
        return view('admin/list_berita');
    }

    public function hapus_list_berita(news $sample)
    {
        $sample->tag()->detach();
        $sample->delete();
        return response()->JSON([
            'success' => true,
        ]);
    }


    // media
    public function media()
    {
        return view('list_media');
    }
}
