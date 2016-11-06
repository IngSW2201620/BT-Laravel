<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreaterouteStatusesAPIRequest;
use App\Http\Requests\API\UpdaterouteStatusesAPIRequest;
use App\Models\routeStatuses;
use App\Repositories\routeStatusesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class routeStatusesController
 * @package App\Http\Controllers\API
 */

class routeStatusesAPIController extends AppBaseController
{
    /** @var  routeStatusesRepository */
    private $routeStatusesRepository;

    public function __construct(routeStatusesRepository $routeStatusesRepo)
    {
        $this->routeStatusesRepository = $routeStatusesRepo;
    }

    /**
     * Display a listing of the routeStatuses.
     * GET|HEAD /routeStatuses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->routeStatusesRepository->pushCriteria(new RequestCriteria($request));
        $this->routeStatusesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $routeStatuses = $this->routeStatusesRepository->all();

        return $this->sendResponse($routeStatuses->toArray(), 'Route Statuses retrieved successfully');
    }

    /**
     * Store a newly created routeStatuses in storage.
     * POST /routeStatuses
     *
     * @param CreaterouteStatusesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreaterouteStatusesAPIRequest $request)
    {
        $input = $request->all();

        $routeStatuses = $this->routeStatusesRepository->create($input);

        return $this->sendResponse($routeStatuses->toArray(), 'Route Statuses saved successfully');
    }

    /**
     * Display the specified routeStatuses.
     * GET|HEAD /routeStatuses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var routeStatuses $routeStatuses */
        $routeStatuses = $this->routeStatusesRepository->findWithoutFail($id);

        if (empty($routeStatuses)) {
            return $this->sendError('Route Statuses not found');
        }

        return $this->sendResponse($routeStatuses->toArray(), 'Route Statuses retrieved successfully');
    }

    /**
     * Update the specified routeStatuses in storage.
     * PUT/PATCH /routeStatuses/{id}
     *
     * @param  int $id
     * @param UpdaterouteStatusesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterouteStatusesAPIRequest $request)
    {
        $input = $request->all();

        /** @var routeStatuses $routeStatuses */
        $routeStatuses = $this->routeStatusesRepository->findWithoutFail($id);

        if (empty($routeStatuses)) {
            return $this->sendError('Route Statuses not found');
        }

        $routeStatuses = $this->routeStatusesRepository->update($input, $id);

        return $this->sendResponse($routeStatuses->toArray(), 'routeStatuses updated successfully');
    }

    /**
     * Remove the specified routeStatuses from storage.
     * DELETE /routeStatuses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var routeStatuses $routeStatuses */
        $routeStatuses = $this->routeStatusesRepository->findWithoutFail($id);

        if (empty($routeStatuses)) {
            return $this->sendError('Route Statuses not found');
        }

        $routeStatuses->delete();

        return $this->sendResponse($id, 'Route Statuses deleted successfully');
    }
}
