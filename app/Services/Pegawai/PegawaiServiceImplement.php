<?php

namespace App\Services\Pegawai;

use LaravelEasyRepository\Service;
use App\Repositories\Pegawai\PegawaiRepository;

class PegawaiServiceImplement extends Service implements PegawaiService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(PegawaiRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
}
