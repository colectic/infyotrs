<?php

use App\Models\CustomerUsers;
use App\Repositories\CustomerUsersRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerUsersRepositoryTest extends TestCase
{
    use MakeCustomerUsersTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CustomerUsersRepository
     */
    protected $customerUsersRepo;

    public function setUp()
    {
        parent::setUp();
        $this->customerUsersRepo = App::make(CustomerUsersRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCustomerUsers()
    {
        $customerUsers = $this->fakeCustomerUsersData();
        $createdCustomerUsers = $this->customerUsersRepo->create($customerUsers);
        $createdCustomerUsers = $createdCustomerUsers->toArray();
        $this->assertArrayHasKey('id', $createdCustomerUsers);
        $this->assertNotNull($createdCustomerUsers['id'], 'Created CustomerUsers must have id specified');
        $this->assertNotNull(CustomerUsers::find($createdCustomerUsers['id']), 'CustomerUsers with given id must be in DB');
        $this->assertModelData($customerUsers, $createdCustomerUsers);
    }

    /**
     * @test read
     */
    public function testReadCustomerUsers()
    {
        $customerUsers = $this->makeCustomerUsers();
        $dbCustomerUsers = $this->customerUsersRepo->find($customerUsers->id);
        $dbCustomerUsers = $dbCustomerUsers->toArray();
        $this->assertModelData($customerUsers->toArray(), $dbCustomerUsers);
    }

    /**
     * @test update
     */
    public function testUpdateCustomerUsers()
    {
        $customerUsers = $this->makeCustomerUsers();
        $fakeCustomerUsers = $this->fakeCustomerUsersData();
        $updatedCustomerUsers = $this->customerUsersRepo->update($fakeCustomerUsers, $customerUsers->id);
        $this->assertModelData($fakeCustomerUsers, $updatedCustomerUsers->toArray());
        $dbCustomerUsers = $this->customerUsersRepo->find($customerUsers->id);
        $this->assertModelData($fakeCustomerUsers, $dbCustomerUsers->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCustomerUsers()
    {
        $customerUsers = $this->makeCustomerUsers();
        $resp = $this->customerUsersRepo->delete($customerUsers->id);
        $this->assertTrue($resp);
        $this->assertNull(CustomerUsers::find($customerUsers->id), 'CustomerUsers should not exist in DB');
    }
}
