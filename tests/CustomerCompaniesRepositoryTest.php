<?php

use App\Models\CustomerCompanies;
use App\Repositories\CustomerCompaniesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerCompaniesRepositoryTest extends TestCase
{
    use MakeCustomerCompaniesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CustomerCompaniesRepository
     */
    protected $customerCompaniesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->customerCompaniesRepo = App::make(CustomerCompaniesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCustomerCompanies()
    {
        $customerCompanies = $this->fakeCustomerCompaniesData();
        $createdCustomerCompanies = $this->customerCompaniesRepo->create($customerCompanies);
        $createdCustomerCompanies = $createdCustomerCompanies->toArray();
        $this->assertArrayHasKey('id', $createdCustomerCompanies);
        $this->assertNotNull($createdCustomerCompanies['id'], 'Created CustomerCompanies must have id specified');
        $this->assertNotNull(CustomerCompanies::find($createdCustomerCompanies['id']), 'CustomerCompanies with given id must be in DB');
        $this->assertModelData($customerCompanies, $createdCustomerCompanies);
    }

    /**
     * @test read
     */
    public function testReadCustomerCompanies()
    {
        $customerCompanies = $this->makeCustomerCompanies();
        $dbCustomerCompanies = $this->customerCompaniesRepo->find($customerCompanies->id);
        $dbCustomerCompanies = $dbCustomerCompanies->toArray();
        $this->assertModelData($customerCompanies->toArray(), $dbCustomerCompanies);
    }

    /**
     * @test update
     */
    public function testUpdateCustomerCompanies()
    {
        $customerCompanies = $this->makeCustomerCompanies();
        $fakeCustomerCompanies = $this->fakeCustomerCompaniesData();
        $updatedCustomerCompanies = $this->customerCompaniesRepo->update($fakeCustomerCompanies, $customerCompanies->id);
        $this->assertModelData($fakeCustomerCompanies, $updatedCustomerCompanies->toArray());
        $dbCustomerCompanies = $this->customerCompaniesRepo->find($customerCompanies->id);
        $this->assertModelData($fakeCustomerCompanies, $dbCustomerCompanies->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCustomerCompanies()
    {
        $customerCompanies = $this->makeCustomerCompanies();
        $resp = $this->customerCompaniesRepo->delete($customerCompanies->id);
        $this->assertTrue($resp);
        $this->assertNull(CustomerCompanies::find($customerCompanies->id), 'CustomerCompanies should not exist in DB');
    }
}
