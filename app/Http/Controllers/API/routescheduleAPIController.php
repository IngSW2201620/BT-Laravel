<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateroutescheduleAPIRequest;
use App\Http\Requests\API\UpdateroutescheduleAPIRequest;
use App\Models\routeschedule;
use App\Repositories\routescheduleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class routescheduleController
 * @package App\Http\Controllers\API
 */

class routescheduleAPIController extends AppBaseController
{
    /** @var  routescheduleRepository */
    private $routescheduleRepository;

    public function __construct(routescheduleRepository $routescheduleRepo)
    {
        $this->routescheduleRepository = $routescheduleRepo;
    }

    /**
     * Display a listing of the routeschedule.
     * GET|HEAD /routeschedules
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->routescheduleRepository->pushCriteria(new RequestCriteria($request));
        $this->routescheduleRepository->pushCriteria(new LimitOffsetCriteria($request));
        $routeschedules = $this->routescheduleRepository->all();

        return $this->sendResponse($routeschedules->toArray(), 'Routeschedules retrieved successfully');
    }

    /**
     * Store a newly created routeschedule in storage.
     * POST /routeschedules
     *
     * @param CreateroutescheduleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateroutescheduleAPIRequest $request)
    {
        $input = $request->all();

        $routeschedules = $this->routescheduleRepository->create($input);

        return $this->sendResponse($routeschedules->toArray(), 'Routeschedule saved successfully');
    }

    /**
     * Display the specified routeschedule.
     * GET|HEAD /routeschedules/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var routeschedule $routeschedule */
        $routeschedule = $this->routescheduleRepository->findWithoutFail($id);

        if (empty($routeschedule)) {
            return $this->sendError('Routeschedule not found');
        }

        return $this->sendResponse($routeschedule->toArray(), 'Routeschedule retrieved successfully');
    }

    /**
     * Update the specified routeschedule in storage.
     * PUT/PATCH /routeschedules/{id}
     *
     * @param  int $id
     * @param UpdateroutescheduleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateroutescheduleAPIRequest $request)
    {
        $input = $request->all();

        /** @var routeschedule $routeschedule */
        $routeschedule = $this->routescheduleRepository->findWithoutFail($id);

        if (empty($routeschedule)) {
            return $this->sendError('Routeschedule not found');
        }

        $routeschedule = $this->routescheduleRepository->update($input, $id);

        return $this->sendResponse($routeschedule->toArray(), 'routeschedule updated successfully');
    }

    /**
     * Remove the specified routeschedule from storage.
     * DELETE /routeschedules/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var routeschedule $routeschedule */
        $routeschedule = $this->routescheduleRepository->findWithoutFail($id);

        if (empty($routeschedule)) {
            return $this->sendError('Routeschedule not found');
        }

        $routeschedule->delete();

        return $this->sendResponse($id, 'Routeschedule deleted successfully');
    }
}
