<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreaterouteStatusesRequest;
use App\Http\Requests\UpdaterouteStatusesRequest;
use App\Repositories\routeStatusesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class routeStatusesController extends AppBaseController
{
    /** @var  routeStatusesRepository */
    private $routeStatusesRepository;

    public function __construct(routeStatusesRepository $routeStatusesRepo)
    {
        $this->routeStatusesRepository = $routeStatusesRepo;
    }

    /**
     * Display a listing of the routeStatuses.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->routeStatusesRepository->pushCriteria(new RequestCriteria($request));
        $routeStatuses = $this->routeStatusesRepository->all();

        return view('route_statuses.index')
            ->with('routeStatuses', $routeStatuses);
    }

    /**
     * Show the form for creating a new routeStatuses.
     *
     * @return Response
     */
    public function create()
    {
        return view('route_statuses.create');
    }

    /**
     * Store a newly created routeStatuses in storage.
     *
     * @param CreaterouteStatusesRequest $request
     *
     * @return Response
     */
    public function store(CreaterouteStatusesRequest $request)
    {
        $input = $request->all();

        $routeStatuses = $this->routeStatusesRepository->create($input);

        Flash::success('Route Statuses saved successfully.');

        return redirect(route('routeStatuses.index'));
    }

    /**
     * Display the specified routeStatuses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $routeStatuses = $this->routeStatusesRepository->findWithoutFail($id);

        if (empty($routeStatuses)) {
            Flash::error('Route Statuses not found');

            return redirect(route('routeStatuses.index'));
        }

        return view('route_statuses.show')->with('routeStatuses', $routeStatuses);
    }

    /**
     * Show the form for editing the specified routeStatuses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $routeStatuses = $this->routeStatusesRepository->findWithoutFail($id);

        if (empty($routeStatuses)) {
            Flash::error('Route Statuses not found');

            return redirect(route('routeStatuses.index'));
        }

        return view('route_statuses.edit')->with('routeStatuses', $routeStatuses);
    }

    /**
     * Update the specified routeStatuses in storage.
     *
     * @param  int              $id
     * @param UpdaterouteStatusesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterouteStatusesRequest $request)
    {
        $routeStatuses = $this->routeStatusesRepository->findWithoutFail($id);

        if (empty($routeStatuses)) {
            Flash::error('Route Statuses not found');

            return redirect(route('routeStatuses.index'));
        }

        $routeStatuses = $this->routeStatusesRepository->update($request->all(), $id);

        Flash::success('Route Statuses updated successfully.');

        return redirect(route('routeStatuses.index'));
    }

    /**
     * Remove the specified routeStatuses from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $routeStatuses = $this->routeStatusesRepository->findWithoutFail($id);

        if (empty($routeStatuses)) {
            Flash::error('Route Statuses not found');

            return redirect(route('routeStatuses.index'));
        }

        $this->routeStatusesRepository->delete($id);

        Flash::success('Route Statuses deleted successfully.');

        return redirect(route('routeStatuses.index'));
    }
}
