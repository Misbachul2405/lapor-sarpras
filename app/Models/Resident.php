<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $fillable = [
        'user',
        'avatar'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}
