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
     * Display a listing of the Ticket.
     * GET|HEAD /tickets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ticketRepository->pushCriteria(new RequestCriteria($request));
        $this->ticketRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tickets = $this->ticketRepository->all();

        return $this->sendResponse($tickets->toArray(), 'Tickets retrieved successfully');
    }

    /**
     * Store a newly created Ticket in storage.
     * POST /tickets
     *
     * @param CreateTicketAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTicketAPIRequest $request)
    {
        $input = $request->all();

        $tickets = $this->ticketRepository->create($input);

        return $this->sendResponse($tickets->toArray(), 'Ticket saved successfully');
    }

    /**
     * Display the specified Ticket.
     * GET|HEAD /tickets/{id}
     *
     * @param  int $id
     *
     * @return Response
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
     * Update the specified Ticket in storage.
     * PUT/PATCH /tickets/{id}
     *
     * @param  int $id
     * @param UpdateTicketAPIRequest $request
     *
     * @return Response
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
     * Remove the specified Ticket from storage.
     * DELETE /tickets/{id}
     *
     * @param  int $id
     *
     * @return Response
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
