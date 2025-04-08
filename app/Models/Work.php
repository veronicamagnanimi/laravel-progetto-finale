<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public function painter() {
        return $this->belongsTo(Painter::class);
    }
}
