<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportStatus extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'report_id',
        'image',
        'status',
        'descriptions'
    ];

    public function report()
    {
        return $this->belongTo(Report::class);
    }
}
