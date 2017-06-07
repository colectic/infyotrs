<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTicketAPIRequest;
use App\Http\Requests\API\UpdateTicketAPIRequest;
use App\Models\Ticket;
use App\Repositories\TicketRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TicketController
 * @package App\Http\Controllers\API
 */

class TicketAPIController extends AppBaseController
{
    /** @var  TicketRepository */
    private $ticketRepository;

    public function __construct(TicketRepository $ticketRepo)
    {
        $this->ticketRepository = $ticketRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tickets",
     *      summary="Get a listing of the Tickets.",
     *      tags={"Ticket"},
     *      description="Get all Tickets",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Ticket")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->ticketRepository->pushCriteria(new RequestCriteria($request));
        $this->ticketRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tickets = $this->ticketRepository->all();

        return $this->sendResponse($tickets->toArray(), 'Tickets retrieved successfully');
    }

    /**
     * @param CreateTicketAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tickets",
     *      summary="Store a newly created Ticket in storage",
     *      tags={"Ticket"},
     *      description="Store Ticket",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Ticket that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Ticket")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Ticket"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTicketAPIRequest $request)
    {
        $input = $request->all();

        $tickets = $this->ticketRepository->create($input);

        return $this->sendResponse($tickets->toArray(), 'Ticket saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tickets/{id}",
     *      summary="Display the specified Ticket",
     *      tags={"Ticket"},
     *      description="Get Ticket",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Ticket",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Ticket"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Ticket $ticket */
        $ticket = $this->ticketRepository->findWithoutFail($id);

        if (empty($ticket)) {
            return $this->sendError('Ticket not found');
        }

        return $this->sendResponse($ticket->toArray(), 'Ticket retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTicketAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tickets/{id}",
     *      summary="Update the specified Ticket in storage",
     *      tags={"Ticket"},
     *      description="Update Ticket",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Ticket",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Ticket that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Ticket")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Ticket"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTicketAPIRequest $request)
    {
        $input = $request->all();

        /** @var Ticket $ticket */
        $ticket = $this->ticketRepository->findWithoutFail($id);

        if (empty($ticket)) {
            return $this->sendError('Ticket not found');
        }

        $ticket = $this->ticketRepository->update($input, $id);

        return $this->sendResponse($ticket->toArray(), 'Ticket updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tickets/{id}",
     *      summary="Remove the specified Ticket from storage",
     *      tags={"Ticket"},
     *      description="Delete Ticket",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Ticket",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Ticket $ticket */
        $ticket = $this->ticketRepository->findWithoutFail($id);

        if (empty($ticket)) {
            return $this->sendError('Ticket not found');
        }

        $ticket->delete();

        return $this->sendResponse($id, 'Ticket deleted successfully');
    }
}
