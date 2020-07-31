<?php

namespace App\Http\Controllers;

use App\administrator;
use App\category;
use App\media;
use App\news;
use App\tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

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

    // berita
    public function validasi_user()
    {
        request()->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'photo' => 'image|mimes:jpg,jpeg,png|max:10000',
            'level' => 'required',
        ]);
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
            if (request()->gambar != '') {
                if ($sample->gambar == request()->gambar) {
                    $new_data['file'] = request()->gambar;
                    $new_data['file-type'] = 'gambar';
                } else {
                    if ($sample->gambar != 'images/news/default.jpg') {Storage::delete($sample->gambar);}
                    $file = request()->gambar;
                    $slug = \Str::slug(request()->title);
                    $url  = $file->storeAS('images/news', "{$slug}.{$file->extension()}");
                    $new_data['file'] = $url;
                    $new_data['file-type'] = 'gambar';
                }
            }else{
                $new_data['file'] = request()->gambar;
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
                ->addColumn('content',function($list_berita){
                    return \Str::limit($list_berita->content,30);
                })
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
        if ($sample->gambar != 'images/news/default.jpg') {
            Storage::delete($sample->gambar);
        }
        $sample->tag()->detach();
        $sample->delete();
        return response()->JSON([
            'success' => true,
        ]);
    }


    // media
    public function media()
    {
        return view('admin/list_media');
    }

    public function mediaapi()
    {
        $data = media::get();
        if(request()->ajax()){
            return DataTables()->of($data)
                    ->addColumn('gambar',function($data){
                        return "<img src='".asset('storage/'.$data->logo)."' width='70' height='70'>";
                    })
                    ->addColumn('tanggal',function($data){
                        return $data->updated_at->format('l, d F Y');
                    })
                    ->addColumn('tombol_aksi',function($data){
                        $table  = "<button class='btn btn-sm btn-success' onclick='editmedia(".$data->id. ");' data-toggle='modal' data-target='#formModal'><i class='tim-icons icon-pencil'></i></button>";
                        $table .= "<button class='btn btn-sm btn-danger ml-1' onclick='hapusmedia(".$data->id.");'><i class='tim-icons icon-trash-simple'></i></button>";
                        return $table;
                    })
                    ->rawColumns(['tombol_aksi', 'gambar','tanggal'])
                    ->make(true);
        }
        return $data;
    }

    public function tambah_media()
    {
        $tampung = request()->all();
        if (request()->Logo) {
            if (request()->Logo) {
                $gambar = request()->Logo;
                $slug = \Str::slug(request()->NamaMedia);
                $url = $gambar->storeAs('images\logomedia', "{$slug}.{$gambar->extension()}");
                $tampung['logo'] = $url;
            }else{
                $tampung['logo'] = 'images\logomedia\default.png';
            }
        }
        $hasil = media::create($tampung);
        return $hasil;
    }

    public function route_edit_media(media $sample)
    {
        return $sample;
    }

    public function edit_media(media $sample)
    {
        $data_baru = request()->all();
        if (request()->Logo) {
            if (request()->Logo == $sample->logo) {
                $data_baru['logo'] = $sample->logo;
            }else{
                if ($sample->logo == 'images\logomedia\default.png') {} 
                else {Storage::delete($sample->logo);}
                $gambar = request()->Logo;
                $slug = \Str::slug(request()->NamaMedia);
                $url = $gambar->storeAS('images/logomedia',"{$slug}.{$gambar->extension()}");
                $data_baru['logo'] = $url;
            }
        }else{
            $data_baru['logo'] = $sample->logo;
        } 
        $sample->update($data_baru);
        return response()->json([
            'success' => true,
        ]);
    }

    public function hapus_media(media $sample)
    {
        if ($sample->logo == 'images\logomedia\default.png') {}
        else{Storage::delete($sample->logo);}
        
        $sample->delete();
        return response()->json([
            'success' => true,
        ]);
    }

    // category & Tag
    public function category_tag()
    {
        return view('admin/category&tag');
    }
    
    // Category
    public function category_api()
    {
        $data = category::get();
        if (request()->ajax()) {
            return DataTables()->of($data)
                    ->addColumn('tanggal',function($data){
                        return $data->updated_at->format('l, d F Y');
                    })
                    ->addColumn('tombol_aksi',function($data){
                        $table = "<button class='btn btn-sm btn-success' onclick='editcategory(" . $data->id . ")'  data-toggle='modal' data-target='#formModal'><i class='tim-icons icon-pencil'></i></button>";
                        $table .= "<button class='btn btn-sm btn-danger ml-1' onclick='hapuscategory(".$data->id. ")'><i class='tim-icons icon-trash-simple'></i></button>";
                        return $table;
                    })
                    ->rawColumns(['tombol_aksi','tanggal'])
                    ->make(true);
        }
        return view('admin/category&tag');
    }

    public function category_tambah()
    {
        $data = request()->all();
        $hasil = category::create($data);
        return $hasil;
    }

    public function category_route_edit(category $sample)
    {
        return $sample;
    }

    public function category_edit(category $sample)
    {
        $data_baru = request()->all();
        $sample->update($data_baru);

        return response()->json([
            'success' => true,
        ]);
    }

    public function category_hapus(category $sample)
    {
        $sample->delete();
        return response()->json([
            'success' => true,
        ]);
    }

    // tag
    public function tag_api()
    {
        $data = tag::get();
        if (request()->ajax()) {
            return DataTables()->of($data)
                ->addColumn('tanggal', function ($data) {
                    return $data->updated_at->format('l, d F Y');
                })
                ->addColumn('tombol_aksi', function ($data) {
                    $table = "<button class='btn btn-sm btn-success' onclick='edittag(" . $data->id . ")'  data-toggle='modal' data-target='#formModalTag'><i class='tim-icons icon-pencil'></i></button>";
                    $table .= "<button class='btn btn-sm btn-danger ml-1' onclick='hapustag(" . $data->id . ")'><i class='tim-icons icon-trash-simple'></i></button>";
                    return $table;
                })
                ->rawColumns(['tombol_aksi', 'tanggal'])
                ->make(true);
        }
        return view('admin/category&tag');
    }

    public function tag_tambah()
    {
        $data = request()->all();
        $hasil = tag::create($data);
        return $hasil;
    }

    public function tag_route_edit(tag $sample)
    {
        return $sample;
    }

    public function tag_edit(tag $sample)
    {
        $data_baru = request()->all();
        $sample->update($data_baru);

        return response()->json([
            'success' => true,
        ]);
    }

    public function tag_hapus(tag $sample)
    {
        $sample->delete();
        return response()->json([
            'success' => true,
        ]);
    }

    public function user()
    {
        return view('admin/user');
    }

    public function user_api()
    {
        $data = User::get();
        if (request()->ajax()) {
            return DataTables()->of($data)
                    ->addColumn('tombol_aksi',function($data){
                        $table = "<button class='btn btn-sm btn-success' onclick='formedit($data->id)' data-toggle='modal' data-target='#formModal'><i class='tim-icons icon-pencil'></i></button>";
                        $table .= "<button class='btn btn-sm btn-warning ml-1' onclick='formhapus($data->id)'><i class='tim-icons icon-trash-simple'></i></button>";

                        return $table;
                    })
                    ->rawColumns(['tombol_aksi'])
                    ->make(true);
        }
        return view('admin/user');
    }

    public function user_tambah()
    {
        $this->validasi_user();

        $data = request()->all();
        $data['password'] = bcrypt(request()->password);
        if (Request()->photo) {
            // gambar
            $slug = \Str::slug(request()->name);
            $gambar = Request()->photo;
            $url = $gambar->storeAS('images/photouser', "{$slug}.{$gambar->extension()}");
            $data['photo'] = $url;  
        }else{
            $data['photo'] = 'images/photouser/default-avatar.png';  
        }
        $hasil = user::create($data);
        return $hasil;
    }
    public function user_route_edit(User $sample)
    {
        $sample['password'] = Crypt::decryptString($sample->password);
        return $sample;
    }
}
