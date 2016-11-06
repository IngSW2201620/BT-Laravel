<?php

namespace App\Repositories;

use App\Models\routes;
use InfyOm\Generator\Common\BaseRepository;

class routesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_assigned_driver',
        'id_assigned_bus',
        'id_road',
        'schedule_time',
        'id_route_status',
        'startDate',
        'endDate'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return routes::class;
    }
}
