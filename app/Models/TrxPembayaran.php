<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxPembayaran extends Model
{
    use HasFactory;
    protected $table = 'trx_pembayaran';
    protected $fillable = [
        'code',
        'peserta_id',
        'amount',
        'status',
        'snap_token'
    ];

    public function ref_peserta()
    {
        return $this->belongsTo(RefPeserta::class, 'peserta_id');
    }
}
