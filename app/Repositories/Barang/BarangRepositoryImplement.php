<?php

namespace App\Repositories\Barang;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Barang;
use Illuminate\Support\Collection;

class BarangRepositoryImplement extends Eloquent implements BarangRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Barang $model)
    {
        $this->model = $model;
    }

    public function getAllWithRelations(...$relations): Collection
    {
        return $this->model->with($relations)->get();
    }
}
