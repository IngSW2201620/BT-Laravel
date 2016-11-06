<?php

namespace App\Repositories;

use App\Models\routeStatuses;
use InfyOm\Generator\Common\BaseRepository;

class routeStatusesRepository extends BaseRepository
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
        return routeStatuses::class;
    }
}
