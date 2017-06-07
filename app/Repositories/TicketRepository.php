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
        'costumer_user',
        'costumer_id',
        'type',
        'subject',
        'body'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Ticket::class;
    }
}
