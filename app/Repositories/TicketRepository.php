<?php

namespace App\Repositories;

use App\Models\Ticket;
use InfyOm\Generator\Common\BaseRepository;

class TicketRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'purchaseDate',
        'expirationDate',
        'usteDate',
        'dateReservation'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Ticket::class;
    }
}
