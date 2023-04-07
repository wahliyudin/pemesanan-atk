<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;

    protected $table = 'permintaan';

    protected $primaryKey = 'kode';

    protected $fillable = [
        'kode',
        'kode_pegawai',
        'tanggal',
        'kode_pemohon',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->kode = IdGenerator::generate(['table' => $model->table, 'field' => 'kode', 'length' => 6, 'prefix' => "B-"]);
        });
    }

    public function barangs()
    {
        return $this->belongsToMany(Barang::class, 'permintaan_barang', 'kode_barang', 'kode_permintaan', 'kode', 'kode');
    }
}
