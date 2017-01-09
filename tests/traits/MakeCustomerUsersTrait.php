<?php

use Faker\Factory as Faker;
use App\Models\CustomerUsers;
use App\Repositories\CustomerUsersRepository;

trait MakeCustomerUsersTrait
{
    /**
     * Create fake instance of CustomerUsers and save it in database
     *
     * @param array $customerUsersFields
     * @return CustomerUsers
     */
    public function makeCustomerUsers($customerUsersFields = [])
    {
        /** @var CustomerUsersRepository $customerUsersRepo */
        $customerUsersRepo = App::make(CustomerUsersRepository::class);
        $theme = $this->fakeCustomerUsersData($customerUsersFields);
        return $customerUsersRepo->create($theme);
    }

    /**
     * Get fake instance of CustomerUsers
     *
     * @param array $customerUsersFields
     * @return CustomerUsers
     */
    public function fakeCustomerUsers($customerUsersFields = [])
    {
        return new CustomerUsers($this->fakeCustomerUsersData($customerUsersFields));
    }

    /**
     * Get fake data of CustomerUsers
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCustomerUsersData($customerUsersFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id' => $fake->word,
            'login' => $fake->word,
            'email' => $fake->word,
            'customer_id' => $fake->word,
            'pw' => $fake->word,
            'title' => $fake->word,
            'first_name' => $fake->word,
            'last_name' => $fake->word,
            'phone' => $fake->word,
            'mobile' => $fake->word,
            'email_ext00' => $fake->word,
            'email_ext01' => $fake->word,
            'comments' => $fake->word,
            'valid_id' => $fake->randomDigitNotNull,
            'create_time' => $fake->word,
            'create_by' => $fake->randomDigitNotNull,
            'change_time' => $fake->word,
            'change_by' => $fake->randomDigitNotNull
        ], $customerUsersFields);
    }
}
