<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerCompaniesApiTest extends TestCase
{
    use MakeCustomerCompaniesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCustomerCompanies()
    {
        $customerCompanies = $this->fakeCustomerCompaniesData();
        $this->json('POST', '/api/v1/customerCompanies', $customerCompanies);

        $this->assertApiResponse($customerCompanies);
    }

    /**
     * @test
     */
    public function testReadCustomerCompanies()
    {
        $customerCompanies = $this->makeCustomerCompanies();
        $this->json('GET', '/api/v1/customerCompanies/'.$customerCompanies->id);

        $this->assertApiResponse($customerCompanies->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCustomerCompanies()
    {
        $customerCompanies = $this->makeCustomerCompanies();
        $editedCustomerCompanies = $this->fakeCustomerCompaniesData();

        $this->json('PUT', '/api/v1/customerCompanies/'.$customerCompanies->id, $editedCustomerCompanies);

        $this->assertApiResponse($editedCustomerCompanies);
    }

    /**
     * @test
     */
    public function testDeleteCustomerCompanies()
    {
        $customerCompanies = $this->makeCustomerCompanies();
        $this->json('DELETE', '/api/v1/customerCompanies/'.$customerCompanies->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/customerCompanies/'.$customerCompanies->id);

        $this->assertResponseStatus(404);
    }
}
