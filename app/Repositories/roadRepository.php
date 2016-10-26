<?php

namespace App\Repositories;

use App\Models\road;
use InfyOm\Generator\Common\BaseRepository;

class roadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'route'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return road::class;
    }
}
