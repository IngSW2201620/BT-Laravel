<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatebusesAPIRequest;
use App\Http\Requests\API\UpdatebusesAPIRequest;
use App\Models\buses;
use App\Repositories\busesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class busesController
 * @package App\Http\Controllers\API
 */

class busesAPIController extends AppBaseController
{
    /** @var  busesRepository */
    private $busesRepository;

    public function __construct(busesRepository $busesRepo)
    {
        $this->busesRepository = $busesRepo;
    }

    /**
     * Display a listing of the buses.
     * GET|HEAD /buses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->busesRepository->pushCriteria(new RequestCriteria($request));
        $this->busesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $buses = $this->busesRepository->all();

        return $this->sendResponse($buses->toArray(), 'Buses retrieved successfully');
    }

    /**
     * Store a newly created buses in storage.
     * POST /buses
     *
     * @param CreatebusesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatebusesAPIRequest $request)
    {
        $input = $request->all();

        $buses = $this->busesRepository->create($input);

        return $this->sendResponse($buses->toArray(), 'Buses saved successfully');
    }

    /**
     * Display the specified buses.
     * GET|HEAD /buses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var buses $buses */
        $buses = $this->busesRepository->findWithoutFail($id);

        if (empty($buses)) {
            return $this->sendError('Buses not found');
        }

        return $this->sendResponse($buses->toArray(), 'Buses retrieved successfully');
    }

    /**
     * Update the specified buses in storage.
     * PUT/PATCH /buses/{id}
     *
     * @param  int $id
     * @param UpdatebusesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebusesAPIRequest $request)
    {
        $input = $request->all();

        /** @var buses $buses */
        $buses = $this->busesRepository->findWithoutFail($id);

        if (empty($buses)) {
            return $this->sendError('Buses not found');
        }

        $buses = $this->busesRepository->update($input, $id);

        return $this->sendResponse($buses->toArray(), 'buses updated successfully');
    }

    /**
     * Remove the specified buses from storage.
     * DELETE /buses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var buses $buses */
        $buses = $this->busesRepository->findWithoutFail($id);

        if (empty($buses)) {
            return $this->sendError('Buses not found');
        }

        $buses->delete();

        return $this->sendResponse($id, 'Buses deleted successfully');
    }
}
