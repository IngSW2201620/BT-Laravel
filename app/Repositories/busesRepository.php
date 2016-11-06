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
        'name',
        'created_at',
        'update_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return buses::class;
    }
}
