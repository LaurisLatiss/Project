<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(App\User::class);
    }
}
