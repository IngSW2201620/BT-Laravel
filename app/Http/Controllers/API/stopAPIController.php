<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatestopAPIRequest;
use App\Http\Requests\API\UpdatestopAPIRequest;
use App\Models\stop;
use App\Repositories\stopRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class stopController
 * @package App\Http\Controllers\API
 */

class stopAPIController extends AppBaseController
{
    /** @var  stopRepository */
    private $stopRepository;

    public function __construct(stopRepository $stopRepo)
    {
        $this->stopRepository = $stopRepo;
    }

    /**
     * Display a listing of the stop.
     * GET|HEAD /stops
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->stopRepository->pushCriteria(new RequestCriteria($request));
        $this->stopRepository->pushCriteria(new LimitOffsetCriteria($request));
        $stops = $this->stopRepository->all();

        return $this->sendResponse($stops->toArray(), 'Stops retrieved successfully');
    }

    /**
     * Store a newly created stop in storage.
     * POST /stops
     *
     * @param CreatestopAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatestopAPIRequest $request)
    {
        $input = $request->all();

        $stops = $this->stopRepository->create($input);

        return $this->sendResponse($stops->toArray(), 'Stop saved successfully');
    }

    /**
     * Display the specified stop.
     * GET|HEAD /stops/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var stop $stop */
        $stop = $this->stopRepository->findWithoutFail($id);

        if (empty($stop)) {
            return $this->sendError('Stop not found');
        }

        return $this->sendResponse($stop->toArray(), 'Stop retrieved successfully');
    }

    /**
     * Update the specified stop in storage.
     * PUT/PATCH /stops/{id}
     *
     * @param  int $id
     * @param UpdatestopAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestopAPIRequest $request)
    {
        $input = $request->all();

        /** @var stop $stop */
        $stop = $this->stopRepository->findWithoutFail($id);

        if (empty($stop)) {
            return $this->sendError('Stop not found');
        }

        $stop = $this->stopRepository->update($input, $id);

        return $this->sendResponse($stop->toArray(), 'stop updated successfully');
    }

    /**
     * Remove the specified stop from storage.
     * DELETE /stops/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var stop $stop */
        $stop = $this->stopRepository->findWithoutFail($id);

        if (empty($stop)) {
            return $this->sendError('Stop not found');
        }

        $stop->delete();

        return $this->sendResponse($id, 'Stop deleted successfully');
    }
}
