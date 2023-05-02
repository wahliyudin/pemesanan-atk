<?php

namespace App\Services\Barang;

use Illuminate\Support\Collection;
use LaravelEasyRepository\BaseService;

interface BarangService extends BaseService
{
    public function getAllWithSatuan(): Collection;
}
