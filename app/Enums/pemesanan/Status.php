<?php

namespace App\Enums\Pemesanan;

enum Status: int
{
    case PROSES = 1;
    case SETUJUI = 2;
    case TOLAK = 3;

    public function label()
    {
        return match ($this) {
            self::PROSES => 'Diproses',
            self::SETUJUI => 'Disetujui',
            self::TOLAK => 'Ditolak',
        };
    }

    public function badge()
    {
        return match ($this) {
            self::PROSES => '<span class="badge badge-primary">Diproses</span>',
            self::SETUJUI => '<span class="badge badge-success">Disetujui</span>',
            self::TOLAK => '<span class="badge badge-danger">Ditolak</span>',
        };
    }
}
