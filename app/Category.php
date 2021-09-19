<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $guarded = [];


    public function services()
    {
        return $this->hasMany(Services::class);
    }
}
