<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $primaryKey = 'kode';

    protected $fillable = [
        'kode',
        'nama',
        'harga',
        'satuan_kode',
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
            $model->kode = IdGenerator::generate(['table' => $model->table, 'field' => 'kode', 'length' => 6, 'prefix' => "B-"]);
        });
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
}
