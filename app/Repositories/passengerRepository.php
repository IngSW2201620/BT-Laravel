<?php

namespace App\Repositories;

use App\Models\passenger;
use InfyOm\Generator\Common\BaseRepository;

class passengerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'balance',
        'user',
        'ticket'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return passenger::class;
    }
}
