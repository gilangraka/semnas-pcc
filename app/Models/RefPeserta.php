<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefPeserta extends Model
{
    use HasFactory;
    protected $table = 'ref_peserta';
    protected $fillable = [
        'user_id',
        'nomor_hp',
        'instansi',
        'profesi',
        'foto_profil',
        'link_facebook',
        'link_instagram',
        'link_twitter',
        'link_tiktok',
        'status_bayar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function trx_pembayaran()
    {
        return $this->hasMany(TrxPembayaran::class, 'peserta_id');
    }

    public function ref_qrcode()
    {
        return $this->hasOne(RefQRCode::class, 'peserta_id');
    }
}
