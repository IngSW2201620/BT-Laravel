<?php

namespace App\Repositories;

use App\Models\Administrador;
use InfyOm\Generator\Common\BaseRepository;

class AdministradorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Administrador::class;
    }
}
