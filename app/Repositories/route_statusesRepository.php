<?php

namespace App\Repositories;

use App\Models\route_statuses;
use InfyOm\Generator\Common\BaseRepository;

class route_statusesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'created_at',
        'updated_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return route_statuses::class;
    }
}
