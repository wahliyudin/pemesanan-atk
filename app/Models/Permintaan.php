<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;

    protected $table = 'permintaan';

    protected $primaryKey = 'kode';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $with = ['barangs'];

    protected $fillable = [
        'kode',
        'kode_pegawai',
        'tanggal',
        'kode_pemohon',
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
            $model->kode = IdGenerator::generate(['table' => $model->table, 'field' => 'kode', 'length' => 6, 'prefix' => "INV-"]);
        });
    }

    public function barangs()
    {
        return $this->belongsToMany(Barang::class, 'permintaan_barang', 'kode_permintaan', 'kode_barang', 'kode', 'kode')->withPivot(['volume', 'keterangan'])->withTimestamps();
    }

    public function pemohon()
    {
        return $this->belongsTo(Pegawai::class, 'kode_pemohon', 'kode');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'kode_pegawai', 'kode');
    }
}
