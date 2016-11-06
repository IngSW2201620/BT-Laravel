<?php

namespace App\Repositories;

use App\Models\roadStops;
use InfyOm\Generator\Common\BaseRepository;

class roadStopsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_road',
        'id_stop'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return roadStops::class;
    }
}
