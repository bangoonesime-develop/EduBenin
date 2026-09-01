<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $guarded = [];

    /**
     * La série (playlist) à laquelle ce livre/tuto appartient,
     * si jamais il en a une (peut être null).
     */
    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}