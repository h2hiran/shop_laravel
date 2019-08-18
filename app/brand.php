<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    public function prodoct()
    {
        return $this->hasMany(prodoct::class);
    }
}
