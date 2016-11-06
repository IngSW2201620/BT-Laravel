<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createroute_statusesAPIRequest;
use App\Http\Requests\API\Updateroute_statusesAPIRequest;
use App\Models\route_statuses;
use App\Repositories\route_statusesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class route_statusesController
 * @package App\Http\Controllers\API
 */

class route_statusesAPIController extends AppBaseController
{
    /** @var  route_statusesRepository */
    private $routeStatusesRepository;

    public function __construct(route_statusesRepository $routeStatusesRepo)
    {
        $this->routeStatusesRepository = $routeStatusesRepo;
    }

    /**
     * Display a listing of the route_statuses.
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
     * Store a newly created route_statuses in storage.
     * POST /routeStatuses
     *
     * @param Createroute_statusesAPIRequest $request
     *
     * @return Response
     */
    public function store(Createroute_statusesAPIRequest $request)
    {
        $input = $request->all();

        $routeStatuses = $this->routeStatusesRepository->create($input);

        return $this->sendResponse($routeStatuses->toArray(), 'Route Statuses saved successfully');
    }

    /**
     * Display the specified route_statuses.
     * GET|HEAD /routeStatuses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var route_statuses $routeStatuses */
        $routeStatuses = $this->routeStatusesRepository->findWithoutFail($id);

        if (empty($routeStatuses)) {
            return $this->sendError('Route Statuses not found');
        }

        return $this->sendResponse($routeStatuses->toArray(), 'Route Statuses retrieved successfully');
    }

    /**
     * Update the specified route_statuses in storage.
     * PUT/PATCH /routeStatuses/{id}
     *
     * @param  int $id
     * @param Updateroute_statusesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateroute_statusesAPIRequest $request)
    {
        $input = $request->all();

        /** @var route_statuses $routeStatuses */
        $routeStatuses = $this->routeStatusesRepository->findWithoutFail($id);

        if (empty($routeStatuses)) {
            return $this->sendError('Route Statuses not found');
        }

        $routeStatuses = $this->routeStatusesRepository->update($input, $id);

        return $this->sendResponse($routeStatuses->toArray(), 'route_statuses updated successfully');
    }

    /**
     * Remove the specified route_statuses from storage.
     * DELETE /routeStatuses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var route_statuses $routeStatuses */
        $routeStatuses = $this->routeStatusesRepository->findWithoutFail($id);

        if (empty($routeStatuses)) {
            return $this->sendError('Route Statuses not found');
        }

        $routeStatuses->delete();

        return $this->sendResponse($id, 'Route Statuses deleted successfully');
    }
}
