<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefQRCode extends Model
{
    use HasFactory;
    protected $table = 'ref_qrcode';
    protected $fillable = [
        'peserta_id',
        'file_qrcode',
        'status_id'
    ];
    protected $casts = [
        'id' => 'string',
    ];

    public function ref_peserta()
    {
        return $this->belongsTo(RefPeserta::class, 'peserta_id');
    }

    public function ref_status()
    {
        return $this->belongsTo(RefStatus::class, 'status_id');
    }
}
