<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $primaryKey = 'kode';

    protected $keyType = 'string';

    protected $fillable = [
        'kode',
        'kode_pegawai',
        'kode_pemasok',
        'tanggal',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->kode = IdGenerator::generate(['table' => $model->table, 'field' => 'kode', 'length' => 6, 'prefix' => "INV-"]);
        });
    }

    public function barangs()
    {
        return $this->belongsToMany(Barang::class, 'pembelian_barang', 'kode_barang', 'kode_pembelian', 'kode', 'kode');
    }
}
