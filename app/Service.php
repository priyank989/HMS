<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $guarded = [];


    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
