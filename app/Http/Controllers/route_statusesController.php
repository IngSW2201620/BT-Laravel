<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createroute_statusesRequest;
use App\Http\Requests\Updateroute_statusesRequest;
use App\Repositories\route_statusesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class route_statusesController extends AppBaseController
{
    /** @var  route_statusesRepository */
    private $routeStatusesRepository;

    public function __construct(route_statusesRepository $routeStatusesRepo)
    {
        $this->routeStatusesRepository = $routeStatusesRepo;
    }

    /**
     * Display a listing of the route_statuses.
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
     * Show the form for creating a new route_statuses.
     *
     * @return Response
     */
    public function create()
    {
        return view('route_statuses.create');
    }

    /**
     * Store a newly created route_statuses in storage.
     *
     * @param Createroute_statusesRequest $request
     *
     * @return Response
     */
    public function store(Createroute_statusesRequest $request)
    {
        $input = $request->all();

        $routeStatuses = $this->routeStatusesRepository->create($input);

        Flash::success('Route Statuses saved successfully.');

        return redirect(route('routeStatuses.index'));
    }

    /**
     * Display the specified route_statuses.
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
     * Show the form for editing the specified route_statuses.
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
     * Update the specified route_statuses in storage.
     *
     * @param  int              $id
     * @param Updateroute_statusesRequest $request
     *
     * @return Response
     */
    public function update($id, Updateroute_statusesRequest $request)
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
     * Remove the specified route_statuses from storage.
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
