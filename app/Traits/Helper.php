<?php

namespace App\Traits;

use App\Models\Pegawai;

trait Helper
{
    public function bendahara()
    {
        return Pegawai::query()->where('');
    }
}
