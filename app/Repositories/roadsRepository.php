<?php

namespace App\Repositories;

use App\Models\roads;
use InfyOm\Generator\Common\BaseRepository;

class roadsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'id_source_stop',
        'id_destination_stop'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return roads::class;
    }
}
