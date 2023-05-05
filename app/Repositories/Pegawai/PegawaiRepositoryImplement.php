<?php

namespace App\Repositories\Pegawai;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Pegawai;

class PegawaiRepositoryImplement extends Eloquent implements PegawaiRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Pegawai $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
