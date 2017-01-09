<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerUsersApiTest extends TestCase
{
    use MakeCustomerUsersTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCustomerUsers()
    {
        $customerUsers = $this->fakeCustomerUsersData();
        $this->json('POST', '/api/v1/customerUsers', $customerUsers);

        $this->assertApiResponse($customerUsers);
    }

    /**
     * @test
     */
    public function testReadCustomerUsers()
    {
        $customerUsers = $this->makeCustomerUsers();
        $this->json('GET', '/api/v1/customerUsers/'.$customerUsers->id);

        $this->assertApiResponse($customerUsers->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCustomerUsers()
    {
        $customerUsers = $this->makeCustomerUsers();
        $editedCustomerUsers = $this->fakeCustomerUsersData();

        $this->json('PUT', '/api/v1/customerUsers/'.$customerUsers->id, $editedCustomerUsers);

        $this->assertApiResponse($editedCustomerUsers);
    }

    /**
     * @test
     */
    public function testDeleteCustomerUsers()
    {
        $customerUsers = $this->makeCustomerUsers();
        $this->json('DELETE', '/api/v1/customerUsers/'.$customerUsers->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/customerUsers/'.$customerUsers->id);

        $this->assertResponseStatus(404);
    }
}
