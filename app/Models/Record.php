<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'work_date',
        'time_in',
        'time_out',
        'total_hours',
    ];
}
