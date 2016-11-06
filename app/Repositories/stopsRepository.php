<?php

namespace App\Repositories;

use App\Models\stops;
use InfyOm\Generator\Common\BaseRepository;

class stopsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'address',
        'name',
        'latitude',
        'longitude'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return stops::class;
    }
}
