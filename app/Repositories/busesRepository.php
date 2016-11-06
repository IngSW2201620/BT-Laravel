<?php

namespace App\Repositories;

use App\Models\buses;
use InfyOm\Generator\Common\BaseRepository;

class busesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'license_plate',
        'brand',
        'model',
        'capacity',
        'photo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return buses::class;
    }
}
