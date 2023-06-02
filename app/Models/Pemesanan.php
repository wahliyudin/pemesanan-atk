<?php

namespace App\Models;

use App\Enums\Pemesanan\Status;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';

    protected $primaryKey = 'kode';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $with = ['barangs'];

    protected $fillable = [
        'kode',
        'tanggal',
        'status'
    ];

    protected $casts = [
        'status' => Status::class
    ];

    protected function kode(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value,
        );
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->kode = IdGenerator::generate(['table' => $model->table, 'field' => 'kode', 'length' => 6, 'prefix' => "PS-"]);
        });
    }

    public function barangs()
    {
        return $this->belongsToMany(Barang::class, 'pemesanan_barang', 'kode_pemesanan', 'kode_barang', 'kode', 'kode')->withPivot(['volume'])->withTimestamps();
    }
}
