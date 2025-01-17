<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportCategory extends Model
{
    protected $fillable =[
        'name',
        'image',
    ];

    public function reports()
    {
                //satu category  bisa memiliki banyak laporan
                return $this->hasMany(Report::class);
    
    }

}
