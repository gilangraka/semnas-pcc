<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefStatus extends Model
{
    use HasFactory;
    protected $table = 'ref_status';
    protected $fillable = [
        'nama_status',
        'css'
    ];
    public $timestamps = false;

    public function ref_qrcode()
    {
        return $this->hasMany(RefQRCode::class, 'status_id');
    }
}
