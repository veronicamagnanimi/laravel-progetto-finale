<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Painter extends Model
{
    public function works() {
        return $this->hasMany(Work::class);
    }
}
