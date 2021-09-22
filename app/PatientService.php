<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientService extends Model
{
    public $guarded = [];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
