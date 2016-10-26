<?php

namespace App\Repositories;

use App\Models\bus;
use InfyOm\Generator\Common\BaseRepository;

class busRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'licensePlate',
        'capacity',
        'currentLatitude',
        'currenteLongitude',
        'soldSeats',
        'color',
        'photo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return bus::class;
    }
}
