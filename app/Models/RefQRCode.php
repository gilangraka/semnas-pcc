<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RefQRCode extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

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
    protected $keyType = 'string';
    public $incrementing = false;

    public function ref_peserta()
    {
        return $this->belongsTo(RefPeserta::class, 'peserta_id');
    }

    public function ref_status()
    {
        return $this->belongsTo(RefStatus::class, 'status_id');
    }
}
