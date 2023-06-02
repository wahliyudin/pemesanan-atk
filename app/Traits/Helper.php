<?php

namespace App\Traits;

use App\Enums\Role;
use App\Models\Pegawai;
use App\Models\User;

trait Helper
{
    public function bendahara()
    {
        return User::query()
            ->with('pegawai')
            ->where('role', Role::BENDAHARA)
            ->first()
            ?->pegawai;
    }
}