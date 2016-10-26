<?php

namespace App\Repositories;

use App\Models\routeschedule;
use InfyOm\Generator\Common\BaseRepository;

class routescheduleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'destination',
        'source',
        'date',
        'status',
        'name',
        'startingDate',
        'endingDate',
        'driver'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return routeschedule::class;
    }
}
