<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedriversAPIRequest;
use App\Http\Requests\API\UpdatedriversAPIRequest;
use App\Models\drivers;
use App\Repositories\driversRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class driversController
 * @package App\Http\Controllers\API
 */

class driversAPIController extends AppBaseController
{
    /** @var  driversRepository */
    private $driversRepository;

    public function __construct(driversRepository $driversRepo)
    {
        $this->driversRepository = $driversRepo;
    }

    /**
     * Display a listing of the drivers.
     * GET|HEAD /drivers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->driversRepository->pushCriteria(new RequestCriteria($request));
        $this->driversRepository->pushCriteria(new LimitOffsetCriteria($request));
        $drivers = $this->driversRepository->all();

        return $this->sendResponse($drivers->toArray(), 'Drivers retrieved successfully');
    }

    /**
     * Store a newly created drivers in storage.
     * POST /drivers
     *
     * @param CreatedriversAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatedriversAPIRequest $request)
    {
        $input = $request->all();

        $drivers = $this->driversRepository->create($input);

        return $this->sendResponse($drivers->toArray(), 'Drivers saved successfully');
    }

    /**
     * Display the specified drivers.
     * GET|HEAD /drivers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var drivers $drivers */
        $drivers = $this->driversRepository->findWithoutFail($id);

        if (empty($drivers)) {
            return $this->sendError('Drivers not found');
        }

        return $this->sendResponse($drivers->toArray(), 'Drivers retrieved successfully');
    }

    /**
     * Update the specified drivers in storage.
     * PUT/PATCH /drivers/{id}
     *
     * @param  int $id
     * @param UpdatedriversAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedriversAPIRequest $request)
    {
        $input = $request->all();

        /** @var drivers $drivers */
        $drivers = $this->driversRepository->findWithoutFail($id);

        if (empty($drivers)) {
            return $this->sendError('Drivers not found');
        }

        $drivers = $this->driversRepository->update($input, $id);

        return $this->sendResponse($drivers->toArray(), 'drivers updated successfully');
    }

    /**
     * Remove the specified drivers from storage.
     * DELETE /drivers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var drivers $drivers */
        $drivers = $this->driversRepository->findWithoutFail($id);

        if (empty($drivers)) {
            return $this->sendError('Drivers not found');
        }

        $drivers->delete();

        return $this->sendResponse($id, 'Drivers deleted successfully');
    }
}
