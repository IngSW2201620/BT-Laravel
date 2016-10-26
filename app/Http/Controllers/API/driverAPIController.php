<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedriverAPIRequest;
use App\Http\Requests\API\UpdatedriverAPIRequest;
use App\Models\driver;
use App\Repositories\driverRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class driverController
 * @package App\Http\Controllers\API
 */

class driverAPIController extends AppBaseController
{
    /** @var  driverRepository */
    private $driverRepository;

    public function __construct(driverRepository $driverRepo)
    {
        $this->driverRepository = $driverRepo;
    }

    /**
     * Display a listing of the driver.
     * GET|HEAD /drivers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->driverRepository->pushCriteria(new RequestCriteria($request));
        $this->driverRepository->pushCriteria(new LimitOffsetCriteria($request));
        $drivers = $this->driverRepository->all();

        return $this->sendResponse($drivers->toArray(), 'Drivers retrieved successfully');
    }

    /**
     * Store a newly created driver in storage.
     * POST /drivers
     *
     * @param CreatedriverAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatedriverAPIRequest $request)
    {
        $input = $request->all();

        $drivers = $this->driverRepository->create($input);

        return $this->sendResponse($drivers->toArray(), 'Driver saved successfully');
    }

    /**
     * Display the specified driver.
     * GET|HEAD /drivers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var driver $driver */
        $driver = $this->driverRepository->findWithoutFail($id);

        if (empty($driver)) {
            return $this->sendError('Driver not found');
        }

        return $this->sendResponse($driver->toArray(), 'Driver retrieved successfully');
    }

    /**
     * Update the specified driver in storage.
     * PUT/PATCH /drivers/{id}
     *
     * @param  int $id
     * @param UpdatedriverAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedriverAPIRequest $request)
    {
        $input = $request->all();

        /** @var driver $driver */
        $driver = $this->driverRepository->findWithoutFail($id);

        if (empty($driver)) {
            return $this->sendError('Driver not found');
        }

        $driver = $this->driverRepository->update($input, $id);

        return $this->sendResponse($driver->toArray(), 'driver updated successfully');
    }

    /**
     * Remove the specified driver from storage.
     * DELETE /drivers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var driver $driver */
        $driver = $this->driverRepository->findWithoutFail($id);

        if (empty($driver)) {
            return $this->sendError('Driver not found');
        }

        $driver->delete();

        return $this->sendResponse($id, 'Driver deleted successfully');
    }
}
