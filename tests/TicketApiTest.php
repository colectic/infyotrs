<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TicketApiTest extends TestCase
{
    use MakeTicketTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTicket()
    {
        $ticket = $this->fakeTicketData();
        $this->json('POST', '/api/v1/tickets', $ticket);

        $this->assertApiResponse($ticket);
    }

    /**
     * @test
     */
    public function testReadTicket()
    {
        $ticket = $this->makeTicket();
        $this->json('GET', '/api/v1/tickets/'.$ticket->id);

        $this->assertApiResponse($ticket->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTicket()
    {
        $ticket = $this->makeTicket();
        $editedTicket = $this->fakeTicketData();

        $this->json('PUT', '/api/v1/tickets/'.$ticket->id, $editedTicket);

        $this->assertApiResponse($editedTicket);
    }

    /**
     * @test
     */
    public function testDeleteTicket()
    {
        $ticket = $this->makeTicket();
        $this->json('DELETE', '/api/v1/tickets/'.$ticket->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tickets/'.$ticket->id);

        $this->assertResponseStatus(404);
    }
}
