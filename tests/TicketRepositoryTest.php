<?php

use App\Models\Ticket;
use App\Repositories\TicketRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TicketRepositoryTest extends TestCase
{
    use MakeTicketTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TicketRepository
     */
    protected $ticketRepo;

    public function setUp()
    {
        parent::setUp();
        $this->ticketRepo = App::make(TicketRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTicket()
    {
        $ticket = $this->fakeTicketData();
        $createdTicket = $this->ticketRepo->create($ticket);
        $createdTicket = $createdTicket->toArray();
        $this->assertArrayHasKey('id', $createdTicket);
        $this->assertNotNull($createdTicket['id'], 'Created Ticket must have id specified');
        $this->assertNotNull(Ticket::find($createdTicket['id']), 'Ticket with given id must be in DB');
        $this->assertModelData($ticket, $createdTicket);
    }

    /**
     * @test read
     */
    public function testReadTicket()
    {
        $ticket = $this->makeTicket();
        $dbTicket = $this->ticketRepo->find($ticket->id);
        $dbTicket = $dbTicket->toArray();
        $this->assertModelData($ticket->toArray(), $dbTicket);
    }

    /**
     * @test update
     */
    public function testUpdateTicket()
    {
        $ticket = $this->makeTicket();
        $fakeTicket = $this->fakeTicketData();
        $updatedTicket = $this->ticketRepo->update($fakeTicket, $ticket->id);
        $this->assertModelData($fakeTicket, $updatedTicket->toArray());
        $dbTicket = $this->ticketRepo->find($ticket->id);
        $this->assertModelData($fakeTicket, $dbTicket->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTicket()
    {
        $ticket = $this->makeTicket();
        $resp = $this->ticketRepo->delete($ticket->id);
        $this->assertTrue($resp);
        $this->assertNull(Ticket::find($ticket->id), 'Ticket should not exist in DB');
    }
}
