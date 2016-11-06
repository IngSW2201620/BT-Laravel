<?php

namespace App\Repositories;

use App\Models\tickets;
use InfyOm\Generator\Common\BaseRepository;

class ticketsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_owner',
        'id_reserved_route',
        'id_used_route',
        'id_used_stop',
        'used_date',
        'expiration_date',
        'id_seller'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return tickets::class;
    }
}
