<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateroutesAPIRequest;
use App\Http\Requests\API\UpdateroutesAPIRequest;
use App\Models\routes;
use App\Repositories\routesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class routesController
 * @package App\Http\Controllers\API
 */

class routesAPIController extends AppBaseController
{
    /** @var  routesRepository */
    private $routesRepository;

    public function __construct(routesRepository $routesRepo)
    {
        $this->routesRepository = $routesRepo;
    }

    /**
     * Display a listing of the routes.
     * GET|HEAD /routes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->routesRepository->pushCriteria(new RequestCriteria($request));
        $this->routesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $routes = $this->routesRepository->all();

        return $this->sendResponse($routes->toArray(), 'Routes retrieved successfully');
    }

    /**
     * Store a newly created routes in storage.
     * POST /routes
     *
     * @param CreateroutesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateroutesAPIRequest $request)
    {
        $input = $request->all();

        $routes = $this->routesRepository->create($input);

        return $this->sendResponse($routes->toArray(), 'Routes saved successfully');
    }

    /**
     * Display the specified routes.
     * GET|HEAD /routes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var routes $routes */
        $routes = $this->routesRepository->findWithoutFail($id);

        if (empty($routes)) {
            return $this->sendError('Routes not found');
        }

        return $this->sendResponse($routes->toArray(), 'Routes retrieved successfully');
    }

    /**
     * Update the specified routes in storage.
     * PUT/PATCH /routes/{id}
     *
     * @param  int $id
     * @param UpdateroutesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateroutesAPIRequest $request)
    {
        $input = $request->all();

        /** @var routes $routes */
        $routes = $this->routesRepository->findWithoutFail($id);

        if (empty($routes)) {
            return $this->sendError('Routes not found');
        }

        $routes = $this->routesRepository->update($input, $id);

        return $this->sendResponse($routes->toArray(), 'routes updated successfully');
    }

    /**
     * Remove the specified routes from storage.
     * DELETE /routes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var routes $routes */
        $routes = $this->routesRepository->findWithoutFail($id);

        if (empty($routes)) {
            return $this->sendError('Routes not found');
        }

        $routes->delete();

        return $this->sendResponse($id, 'Routes deleted successfully');
    }
}
