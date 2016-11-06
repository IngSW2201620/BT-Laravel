<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatestopsAPIRequest;
use App\Http\Requests\API\UpdatestopsAPIRequest;
use App\Models\stops;
use App\Repositories\stopsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class stopsController
 * @package App\Http\Controllers\API
 */

class stopsAPIController extends AppBaseController
{
    /** @var  stopsRepository */
    private $stopsRepository;

    public function __construct(stopsRepository $stopsRepo)
    {
        $this->stopsRepository = $stopsRepo;
    }

    /**
     * Display a listing of the stops.
     * GET|HEAD /stops
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->stopsRepository->pushCriteria(new RequestCriteria($request));
        $this->stopsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $stops = $this->stopsRepository->all();

        return $this->sendResponse($stops->toArray(), 'Stops retrieved successfully');
    }

    /**
     * Store a newly created stops in storage.
     * POST /stops
     *
     * @param CreatestopsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatestopsAPIRequest $request)
    {
        $input = $request->all();

        $stops = $this->stopsRepository->create($input);

        return $this->sendResponse($stops->toArray(), 'Stops saved successfully');
    }

    /**
     * Display the specified stops.
     * GET|HEAD /stops/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var stops $stops */
        $stops = $this->stopsRepository->findWithoutFail($id);

        if (empty($stops)) {
            return $this->sendError('Stops not found');
        }

        return $this->sendResponse($stops->toArray(), 'Stops retrieved successfully');
    }

    /**
     * Update the specified stops in storage.
     * PUT/PATCH /stops/{id}
     *
     * @param  int $id
     * @param UpdatestopsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestopsAPIRequest $request)
    {
        $input = $request->all();

        /** @var stops $stops */
        $stops = $this->stopsRepository->findWithoutFail($id);

        if (empty($stops)) {
            return $this->sendError('Stops not found');
        }

        $stops = $this->stopsRepository->update($input, $id);

        return $this->sendResponse($stops->toArray(), 'stops updated successfully');
    }

    /**
     * Remove the specified stops from storage.
     * DELETE /stops/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var stops $stops */
        $stops = $this->stopsRepository->findWithoutFail($id);

        if (empty($stops)) {
            return $this->sendError('Stops not found');
        }

        $stops->delete();

        return $this->sendResponse($id, 'Stops deleted successfully');
    }
}
