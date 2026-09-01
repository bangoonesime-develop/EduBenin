<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $guarded = [];

    /**
     * Les vidéos/livres de cette série, triés dans l'ordre de
     * lecture (1ère vidéo en premier).
     */
    public function livres()
    {
        return $this->hasMany(Livre::class)->orderBy('ordre');
    }
}