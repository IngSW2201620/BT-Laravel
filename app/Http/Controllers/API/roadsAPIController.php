<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateroadsAPIRequest;
use App\Http\Requests\API\UpdateroadsAPIRequest;
use App\Models\roads;
use App\Repositories\roadsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class roadsController
 * @package App\Http\Controllers\API
 */

class roadsAPIController extends AppBaseController
{
    /** @var  roadsRepository */
    private $roadsRepository;

    public function __construct(roadsRepository $roadsRepo)
    {
        $this->roadsRepository = $roadsRepo;
    }

    /**
     * Display a listing of the roads.
     * GET|HEAD /roads
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roadsRepository->pushCriteria(new RequestCriteria($request));
        $this->roadsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $roads = $this->roadsRepository->all();

        return $this->sendResponse($roads->toArray(), 'Roads retrieved successfully');
    }

    /**
     * Store a newly created roads in storage.
     * POST /roads
     *
     * @param CreateroadsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateroadsAPIRequest $request)
    {
        $input = $request->all();

        $roads = $this->roadsRepository->create($input);

        return $this->sendResponse($roads->toArray(), 'Roads saved successfully');
    }

    /**
     * Display the specified roads.
     * GET|HEAD /roads/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var roads $roads */
        $roads = $this->roadsRepository->findWithoutFail($id);

        if (empty($roads)) {
            return $this->sendError('Roads not found');
        }

        return $this->sendResponse($roads->toArray(), 'Roads retrieved successfully');
    }

    /**
     * Update the specified roads in storage.
     * PUT/PATCH /roads/{id}
     *
     * @param  int $id
     * @param UpdateroadsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateroadsAPIRequest $request)
    {
        $input = $request->all();

        /** @var roads $roads */
        $roads = $this->roadsRepository->findWithoutFail($id);

        if (empty($roads)) {
            return $this->sendError('Roads not found');
        }

        $roads = $this->roadsRepository->update($input, $id);

        return $this->sendResponse($roads->toArray(), 'roads updated successfully');
    }

    /**
     * Remove the specified roads from storage.
     * DELETE /roads/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var roads $roads */
        $roads = $this->roadsRepository->findWithoutFail($id);

        if (empty($roads)) {
            return $this->sendError('Roads not found');
        }

        $roads->delete();

        return $this->sendResponse($id, 'Roads deleted successfully');
    }
}
