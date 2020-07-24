<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $table = 'news';
    protected $fillable = ['title','content','file-type','file','media_massa','viewer'];

    public function category()
    {
        return $this->belongsTo(category::class,'category_id');
    }
}
