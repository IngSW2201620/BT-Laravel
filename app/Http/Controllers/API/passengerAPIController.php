<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepassengerAPIRequest;
use App\Http\Requests\API\UpdatepassengerAPIRequest;
use App\Models\passenger;
use App\Repositories\passengerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class passengerController
 * @package App\Http\Controllers\API
 */

class passengerAPIController extends AppBaseController
{
    /** @var  passengerRepository */
    private $passengerRepository;

    public function __construct(passengerRepository $passengerRepo)
    {
        $this->passengerRepository = $passengerRepo;
    }

    /**
     * Display a listing of the passenger.
     * GET|HEAD /passengers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->passengerRepository->pushCriteria(new RequestCriteria($request));
        $this->passengerRepository->pushCriteria(new LimitOffsetCriteria($request));
        $passengers = $this->passengerRepository->all();

        return $this->sendResponse($passengers->toArray(), 'Passengers retrieved successfully');
    }

    /**
     * Store a newly created passenger in storage.
     * POST /passengers
     *
     * @param CreatepassengerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatepassengerAPIRequest $request)
    {
        $input = $request->all();

        $passengers = $this->passengerRepository->create($input);

        return $this->sendResponse($passengers->toArray(), 'Passenger saved successfully');
    }

    /**
     * Display the specified passenger.
     * GET|HEAD /passengers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var passenger $passenger */
        $passenger = $this->passengerRepository->findWithoutFail($id);

        if (empty($passenger)) {
            return $this->sendError('Passenger not found');
        }

        return $this->sendResponse($passenger->toArray(), 'Passenger retrieved successfully');
    }

    /**
     * Update the specified passenger in storage.
     * PUT/PATCH /passengers/{id}
     *
     * @param  int $id
     * @param UpdatepassengerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepassengerAPIRequest $request)
    {
        $input = $request->all();

        /** @var passenger $passenger */
        $passenger = $this->passengerRepository->findWithoutFail($id);

        if (empty($passenger)) {
            return $this->sendError('Passenger not found');
        }

        $passenger = $this->passengerRepository->update($input, $id);

        return $this->sendResponse($passenger->toArray(), 'passenger updated successfully');
    }

    /**
     * Remove the specified passenger from storage.
     * DELETE /passengers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var passenger $passenger */
        $passenger = $this->passengerRepository->findWithoutFail($id);

        if (empty($passenger)) {
            return $this->sendError('Passenger not found');
        }

        $passenger->delete();

        return $this->sendResponse($id, 'Passenger deleted successfully');
    }
}
