<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable = (['NamaTag']);

    public function news(){
        return $this->belongsToMany(news::class)->where('file-type', 'gambar');
    }

    public function news_count()
    {
        return $this->belongsToMany(news::class)->where('file-type', 'gambar');
    }

    public function news_terbaru()
    {
        return $this->belongsToMany(news::class)->where('file-type', 'gambar')->orderby('created_at', 'desc')->orderby('updated_at', 'desc');
    }

    public function news_terpopuler()
    {
        return $this->belongsToMany(news::class)->where('file-type', 'gambar')->orderby('created_at', 'desc')->orderby('updated_at', 'desc')->orderby('viewer', 'desc');
    }

    public function videotentang()
    {
        return $this->belongsToMany(news::class)->where('file-type', 'video')->orderby('created_at', 'desc')->orderby('viewer', 'desc');
    }
}
