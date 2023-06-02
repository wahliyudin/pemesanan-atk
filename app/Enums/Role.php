<?php

namespace App\Enums;

enum Role: string
{
    case KEPALA_DINAS = 'kepala_dinas';
    case BENDAHARA = 'bendahara';
    case KEPALA_BIDANG = 'kepala_bidang';

    public function label()
    {
        return match ($this) {
            self::KEPALA_DINAS => 'Kepala Dinas',
            self::BENDAHARA => 'Bendahara',
            self::KEPALA_BIDANG => 'Kepala Bidang',
        };
    }
}
