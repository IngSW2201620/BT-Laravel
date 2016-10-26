<?php

namespace App\Repositories;

use App\Models\driver;
use InfyOm\Generator\Common\BaseRepository;

class driverRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'firstName',
        'lastName',
        'photo',
        'administrator'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return driver::class;
    }
}
