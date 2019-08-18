<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prodoct extends Model
{
    public function brand()
    {
        return $this->belongsTo(brand::class);
    }

    public function karbar()
    {
        return $this->belongsToMany(karbar::class);
    }
}
