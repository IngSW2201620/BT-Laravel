<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateroadStopsAPIRequest;
use App\Http\Requests\API\UpdateroadStopsAPIRequest;
use App\Models\roadStops;
use App\Repositories\roadStopsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class roadStopsController
 * @package App\Http\Controllers\API
 */

class roadStopsAPIController extends AppBaseController
{
    /** @var  roadStopsRepository */
    private $roadStopsRepository;

    public function __construct(roadStopsRepository $roadStopsRepo)
    {
        $this->roadStopsRepository = $roadStopsRepo;
    }

    /**
     * Display a listing of the roadStops.
     * GET|HEAD /roadStops
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roadStopsRepository->pushCriteria(new RequestCriteria($request));
        $this->roadStopsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $roadStops = $this->roadStopsRepository->all();

        return $this->sendResponse($roadStops->toArray(), 'Road Stops retrieved successfully');
    }

    /**
     * Store a newly created roadStops in storage.
     * POST /roadStops
     *
     * @param CreateroadStopsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateroadStopsAPIRequest $request)
    {
        $input = $request->all();

        $roadStops = $this->roadStopsRepository->create($input);

        return $this->sendResponse($roadStops->toArray(), 'Road Stops saved successfully');
    }

    /**
     * Display the specified roadStops.
     * GET|HEAD /roadStops/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var roadStops $roadStops */
        $roadStops = $this->roadStopsRepository->findWithoutFail($id);

        if (empty($roadStops)) {
            return $this->sendError('Road Stops not found');
        }

        return $this->sendResponse($roadStops->toArray(), 'Road Stops retrieved successfully');
    }

    /**
     * Update the specified roadStops in storage.
     * PUT/PATCH /roadStops/{id}
     *
     * @param  int $id
     * @param UpdateroadStopsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateroadStopsAPIRequest $request)
    {
        $input = $request->all();

        /** @var roadStops $roadStops */
        $roadStops = $this->roadStopsRepository->findWithoutFail($id);

        if (empty($roadStops)) {
            return $this->sendError('Road Stops not found');
        }

        $roadStops = $this->roadStopsRepository->update($input, $id);

        return $this->sendResponse($roadStops->toArray(), 'roadStops updated successfully');
    }

    /**
     * Remove the specified roadStops from storage.
     * DELETE /roadStops/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var roadStops $roadStops */
        $roadStops = $this->roadStopsRepository->findWithoutFail($id);

        if (empty($roadStops)) {
            return $this->sendError('Road Stops not found');
        }

        $roadStops->delete();

        return $this->sendResponse($id, 'Road Stops deleted successfully');
    }
}
