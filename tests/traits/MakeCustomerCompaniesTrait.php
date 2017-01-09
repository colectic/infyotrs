<?php

use Faker\Factory as Faker;
use App\Models\CustomerCompanies;
use App\Repositories\CustomerCompaniesRepository;

trait MakeCustomerCompaniesTrait
{
    /**
     * Create fake instance of CustomerCompanies and save it in database
     *
     * @param array $customerCompaniesFields
     * @return CustomerCompanies
     */
    public function makeCustomerCompanies($customerCompaniesFields = [])
    {
        /** @var CustomerCompaniesRepository $customerCompaniesRepo */
        $customerCompaniesRepo = App::make(CustomerCompaniesRepository::class);
        $theme = $this->fakeCustomerCompaniesData($customerCompaniesFields);
        return $customerCompaniesRepo->create($theme);
    }

    /**
     * Get fake instance of CustomerCompanies
     *
     * @param array $customerCompaniesFields
     * @return CustomerCompanies
     */
    public function fakeCustomerCompanies($customerCompaniesFields = [])
    {
        return new CustomerCompanies($this->fakeCustomerCompaniesData($customerCompaniesFields));
    }

    /**
     * Get fake data of CustomerCompanies
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCustomerCompaniesData($customerCompaniesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'CIF' => $fake->word,
            'city' => $fake->word,
            'comarca' => $fake->word,
            'provincia' => $fake->word,
            'ambit_actuacio' => $fake->word,
            'forma_juridica' => $fake->word,
            'via_coneixement' => $fake->word,
            'comments' => $fake->word,
            'valid_id' => $fake->randomDigitNotNull,
            'create_time' => $fake->word,
            'create_by' => $fake->randomDigitNotNull,
            'change_time' => $fake->word,
            'change_by' => $fake->randomDigitNotNull
        ], $customerCompaniesFields);
    }
}
