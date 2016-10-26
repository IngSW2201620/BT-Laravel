<?php

namespace App\Repositories;

use App\Models\Seller;
use InfyOm\Generator\Common\BaseRepository;

class SellerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'firstName',
        'lastName',
        'idTicket'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Seller::class;
    }
}
