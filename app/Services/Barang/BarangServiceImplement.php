<?php

namespace App\Services\Barang;

use LaravelEasyRepository\Service;
use App\Repositories\Barang\BarangRepository;
use Illuminate\Support\Collection;

class BarangServiceImplement extends Service implements BarangService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(BarangRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function getAllWithSatuan(): Collection
    {
        return $this->mainRepository->getAllWithRelations('satuan');
    }
}
