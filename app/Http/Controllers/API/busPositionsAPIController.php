<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatebusPositionsAPIRequest;
use App\Http\Requests\API\UpdatebusPositionsAPIRequest;
use App\Models\busPositions;
use App\Repositories\busPositionsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class busPositionsController
 * @package App\Http\Controllers\API
 */

class busPositionsAPIController extends AppBaseController
{
    /** @var  busPositionsRepository */
    private $busPositionsRepository;

    public function __construct(busPositionsRepository $busPositionsRepo)
    {
        $this->busPositionsRepository = $busPositionsRepo;
    }

    /**
     * Display a listing of the busPositions.
     * GET|HEAD /busPositions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->busPositionsRepository->pushCriteria(new RequestCriteria($request));
        $this->busPositionsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $busPositions = $this->busPositionsRepository->all();

        return $this->sendResponse($busPositions->toArray(), 'Bus Positions retrieved successfully');
    }

    /**
     * Store a newly created busPositions in storage.
     * POST /busPositions
     *
     * @param CreatebusPositionsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatebusPositionsAPIRequest $request)
    {
        $input = $request->all();

        $busPositions = $this->busPositionsRepository->create($input);

        return $this->sendResponse($busPositions->toArray(), 'Bus Positions saved successfully');
    }

    /**
     * Display the specified busPositions.
     * GET|HEAD /busPositions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var busPositions $busPositions */
        $busPositions = $this->busPositionsRepository->findWithoutFail($id);

        if (empty($busPositions)) {
            return $this->sendError('Bus Positions not found');
        }

        return $this->sendResponse($busPositions->toArray(), 'Bus Positions retrieved successfully');
    }

    /**
     * Update the specified busPositions in storage.
     * PUT/PATCH /busPositions/{id}
     *
     * @param  int $id
     * @param UpdatebusPositionsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebusPositionsAPIRequest $request)
    {
        $input = $request->all();

        /** @var busPositions $busPositions */
        $busPositions = $this->busPositionsRepository->findWithoutFail($id);

        if (empty($busPositions)) {
            return $this->sendError('Bus Positions not found');
        }

        $busPositions = $this->busPositionsRepository->update($input, $id);

        return $this->sendResponse($busPositions->toArray(), 'busPositions updated successfully');
    }

    /**
     * Remove the specified busPositions from storage.
     * DELETE /busPositions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var busPositions $busPositions */
        $busPositions = $this->busPositionsRepository->findWithoutFail($id);

        if (empty($busPositions)) {
            return $this->sendError('Bus Positions not found');
        }

        $busPositions->delete();

        return $this->sendResponse($id, 'Bus Positions deleted successfully');
    }
}
