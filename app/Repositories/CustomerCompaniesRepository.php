<?php

namespace App\Repositories;

use App\Models\CustomerCompanies;
use InfyOm\Generator\Common\BaseRepository;

class CustomerCompaniesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'customer_id',
        'name',
        'CIF',
        'city',
        'comarca',
        'provincia',
        'ambit_actuacio',
        'forma_juridica',
        'via_coneixement',
        'comments',
        'valid_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CustomerCompanies::class;
    }
}
