<?php

use Faker\Factory as Faker;
use App\Models\Ticket;
use App\Repositories\TicketRepository;

trait MakeTicketTrait
{
    /**
     * Create fake instance of Ticket and save it in database
     *
     * @param array $ticketFields
     * @return Ticket
     */
    public function makeTicket($ticketFields = [])
    {
        /** @var TicketRepository $ticketRepo */
        $ticketRepo = App::make(TicketRepository::class);
        $theme = $this->fakeTicketData($ticketFields);
        return $ticketRepo->create($theme);
    }

    /**
     * Get fake instance of Ticket
     *
     * @param array $ticketFields
     * @return Ticket
     */
    public function fakeTicket($ticketFields = [])
    {
        return new Ticket($this->fakeTicketData($ticketFields));
    }

    /**
     * Get fake data of Ticket
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTicketData($ticketFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'costumer_user' => $fake->word,
            'costumer_id' => $fake->word,
            'type' => $fake->randomDigitNotNull,
            'subject' => $fake->text,
            'body' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $ticketFields);
    }
}
