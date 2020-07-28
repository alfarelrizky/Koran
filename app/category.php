<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class category extends Model
{
    protected $fillable = ['NamaKategori'];
    public function news()
    {
        return $this->HasMany(news::class,'category_id')->where('file-type', 'gambar');
    }
}
