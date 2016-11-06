<?php

namespace App\Repositories;

use App\Models\busPositions;
use InfyOm\Generator\Common\BaseRepository;

class busPositionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_bus',
        'latitude',
        'longitude'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return busPositions::class;
    }
}
