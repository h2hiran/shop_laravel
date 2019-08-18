<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class karbar extends Model
{
    public function prodoct()
    {
        return $this->belongsToMany(prodoct::class);
    }

}
