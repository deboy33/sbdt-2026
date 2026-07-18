<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquitySnapshot extends Model
{
    protected $guarded = [];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
