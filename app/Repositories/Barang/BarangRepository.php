<?php

namespace App\Repositories\Barang;

use Illuminate\Support\Collection;
use LaravelEasyRepository\Repository;

interface BarangRepository extends Repository
{
    public function getAllWithRelations(...$relations): Collection;
}
