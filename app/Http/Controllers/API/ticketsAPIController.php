<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateticketsAPIRequest;
use App\Http\Requests\API\UpdateticketsAPIRequest;
use App\Models\tickets;
use App\Repositories\ticketsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ticketsController
 * @package App\Http\Controllers\API
 */

class ticketsAPIController extends AppBaseController
{
    /** @var  ticketsRepository */
    private $ticketsRepository;

    public function __construct(ticketsRepository $ticketsRepo)
    {
        $this->ticketsRepository = $ticketsRepo;
    }

    /**
     * Display a listing of the tickets.
     * GET|HEAD /tickets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ticketsRepository->pushCriteria(new RequestCriteria($request));
        $this->ticketsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tickets = $this->ticketsRepository->all();

        return $this->sendResponse($tickets->toArray(), 'Tickets retrieved successfully');
    }

    /**
     * Store a newly created tickets in storage.
     * POST /tickets
     *
     * @param CreateticketsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateticketsAPIRequest $request)
    {
        $input = $request->all();

        $tickets = $this->ticketsRepository->create($input);

        return $this->sendResponse($tickets->toArray(), 'Tickets saved successfully');
    }

    /**
     * Display the specified tickets.
     * GET|HEAD /tickets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tickets $tickets */
        $tickets = $this->ticketsRepository->findWithoutFail($id);

        if (empty($tickets)) {
            return $this->sendError('Tickets not found');
        }

        return $this->sendResponse($tickets->toArray(), 'Tickets retrieved successfully');
    }

    /**
     * Update the specified tickets in storage.
     * PUT/PATCH /tickets/{id}
     *
     * @param  int $id
     * @param UpdateticketsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateticketsAPIRequest $request)
    {
        $input = $request->all();

        /** @var tickets $tickets */
        $tickets = $this->ticketsRepository->findWithoutFail($id);

        if (empty($tickets)) {
            return $this->sendError('Tickets not found');
        }

        $tickets = $this->ticketsRepository->update($input, $id);

        return $this->sendResponse($tickets->toArray(), 'tickets updated successfully');
    }

    /**
     * Remove the specified tickets from storage.
     * DELETE /tickets/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tickets $tickets */
        $tickets = $this->ticketsRepository->findWithoutFail($id);

        if (empty($tickets)) {
            return $this->sendError('Tickets not found');
        }

        $tickets->delete();

        return $this->sendResponse($id, 'Tickets deleted successfully');
    }
}
