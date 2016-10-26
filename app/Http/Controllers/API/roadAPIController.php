<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateroadAPIRequest;
use App\Http\Requests\API\UpdateroadAPIRequest;
use App\Models\road;
use App\Repositories\roadRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class roadController
 * @package App\Http\Controllers\API
 */

class roadAPIController extends AppBaseController
{
    /** @var  roadRepository */
    private $roadRepository;

    public function __construct(roadRepository $roadRepo)
    {
        $this->roadRepository = $roadRepo;
    }

    /**
     * Display a listing of the road.
     * GET|HEAD /roads
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roadRepository->pushCriteria(new RequestCriteria($request));
        $this->roadRepository->pushCriteria(new LimitOffsetCriteria($request));
        $roads = $this->roadRepository->all();

        return $this->sendResponse($roads->toArray(), 'Roads retrieved successfully');
    }

    /**
     * Store a newly created road in storage.
     * POST /roads
     *
     * @param CreateroadAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateroadAPIRequest $request)
    {
        $input = $request->all();

        $roads = $this->roadRepository->create($input);

        return $this->sendResponse($roads->toArray(), 'Road saved successfully');
    }

    /**
     * Display the specified road.
     * GET|HEAD /roads/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var road $road */
        $road = $this->roadRepository->findWithoutFail($id);

        if (empty($road)) {
            return $this->sendError('Road not found');
        }

        return $this->sendResponse($road->toArray(), 'Road retrieved successfully');
    }

    /**
     * Update the specified road in storage.
     * PUT/PATCH /roads/{id}
     *
     * @param  int $id
     * @param UpdateroadAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateroadAPIRequest $request)
    {
        $input = $request->all();

        /** @var road $road */
        $road = $this->roadRepository->findWithoutFail($id);

        if (empty($road)) {
            return $this->sendError('Road not found');
        }

        $road = $this->roadRepository->update($input, $id);

        return $this->sendResponse($road->toArray(), 'road updated successfully');
    }

    /**
     * Remove the specified road from storage.
     * DELETE /roads/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var road $road */
        $road = $this->roadRepository->findWithoutFail($id);

        if (empty($road)) {
            return $this->sendError('Road not found');
        }

        $road->delete();

        return $this->sendResponse($id, 'Road deleted successfully');
    }
}
