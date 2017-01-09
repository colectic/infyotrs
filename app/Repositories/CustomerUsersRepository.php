<?php

namespace App\Repositories;

use App\Models\CustomerUsers;
use InfyOm\Generator\Common\BaseRepository;

class CustomerUsersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'login',
        'email',
        'customer_id',
        'title',
        'first_name',
        'last_name',
        'phone',
        'mobile',
        'email_ext00',
        'email_ext01',
        'comments',
        'valid_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CustomerUsers::class;
    }
}
