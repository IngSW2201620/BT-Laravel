<?php

namespace App\Repositories;

use App\Models\stop;
use InfyOm\Generator\Common\BaseRepository;

class stopRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'address',
        'name',
        'latitude',
        'longitude',
        'status',
        'road'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return stop::class;
    }
}
