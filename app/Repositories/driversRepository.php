<?php

namespace App\Repositories;

use App\Models\drivers;
use InfyOm\Generator\Common\BaseRepository;

class driversRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'document_type',
        'document_number',
        'driving_license_id',
        'rh',
        'photo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return drivers::class;
    }
}
