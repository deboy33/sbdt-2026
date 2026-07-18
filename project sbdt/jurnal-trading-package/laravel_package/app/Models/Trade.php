<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $guarded = [];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function scopeWin($query)
    {
        return $query->where('hasil_wl', 'WIN');
    }

    public function scopeLoss($query)
    {
        return $query->where('hasil_wl', 'LOSS');
    }

    public function scopePair($query, string $pair)
    {
        return $query->where('pair', $pair);
    }
}
