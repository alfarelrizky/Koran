<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class media extends Model
{
    protected $fillable = ['NamaMedia','logo'];

    public function news()
    {
        return $this->hasMany(news::class);
    }
}
