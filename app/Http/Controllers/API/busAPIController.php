<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatebusAPIRequest;
use App\Http\Requests\API\UpdatebusAPIRequest;
use App\Models\bus;
use App\Repositories\busRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class busController
 * @package App\Http\Controllers\API
 */

class busAPIController extends AppBaseController
{
    /** @var  busRepository */
    private $busRepository;

    public function __construct(busRepository $busRepo)
    {
        $this->busRepository = $busRepo;
    }

    /**
     * Display a listing of the bus.
     * GET|HEAD /buses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->busRepository->pushCriteria(new RequestCriteria($request));
        $this->busRepository->pushCriteria(new LimitOffsetCriteria($request));
        $buses = $this->busRepository->all();

        return $this->sendResponse($buses->toArray(), 'Buses retrieved successfully');
    }

    /**
     * Store a newly created bus in storage.
     * POST /buses
     *
     * @param CreatebusAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatebusAPIRequest $request)
    {
        $input = $request->all();

        $buses = $this->busRepository->create($input);

        return $this->sendResponse($buses->toArray(), 'Bus saved successfully');
    }

    /**
     * Display the specified bus.
     * GET|HEAD /buses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var bus $bus */
        $bus = $this->busRepository->findWithoutFail($id);

        if (empty($bus)) {
            return $this->sendError('Bus not found');
        }

        return $this->sendResponse($bus->toArray(), 'Bus retrieved successfully');
    }

    /**
     * Update the specified bus in storage.
     * PUT/PATCH /buses/{id}
     *
     * @param  int $id
     * @param UpdatebusAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebusAPIRequest $request)
    {
        $input = $request->all();

        /** @var bus $bus */
        $bus = $this->busRepository->findWithoutFail($id);

        if (empty($bus)) {
            return $this->sendError('Bus not found');
        }

        $bus = $this->busRepository->update($input, $id);

        return $this->sendResponse($bus->toArray(), 'bus updated successfully');
    }

    /**
     * Remove the specified bus from storage.
     * DELETE /buses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var bus $bus */
        $bus = $this->busRepository->findWithoutFail($id);

        if (empty($bus)) {
            return $this->sendError('Bus not found');
        }

        $bus->delete();

        return $this->sendResponse($id, 'Bus deleted successfully');
    }
}
