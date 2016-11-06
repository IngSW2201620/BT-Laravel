<?php

namespace App\Repositories;

use App\Models\sellers;
use InfyOm\Generator\Common\BaseRepository;

class sellersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return sellers::class;
    }
}
