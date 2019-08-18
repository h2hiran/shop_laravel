<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nazar extends Model
{
    public function karbar()
    {
        return $this->belongsToMany(karbar::class);
    }
}
