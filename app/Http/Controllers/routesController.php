<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateroutesRequest;
use App\Http\Requests\UpdateroutesRequest;
use App\Repositories\routesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class routesController extends AppBaseController
{
    /** @var  routesRepository */
    private $routesRepository;

    public function __construct(routesRepository $routesRepo)
    {
        $this->routesRepository = $routesRepo;
    }

    /**
     * Display a listing of the routes.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->routesRepository->pushCriteria(new RequestCriteria($request));
        $routes = $this->routesRepository->all();

        return view('routes.index')
            ->with('routes', $routes);
    }

    /**
     * Show the form for creating a new routes.
     *
     * @return Response
     */
    public function create()
    {
        return view('routes.create');
    }

    /**
     * Store a newly created routes in storage.
     *
     * @param CreateroutesRequest $request
     *
     * @return Response
     */
    public function store(CreateroutesRequest $request)
    {
        $input = $request->all();

        $routes = $this->routesRepository->create($input);

        Flash::success('Routes saved successfully.');

        return redirect(route('routes.index'));
    }

    /**
     * Display the specified routes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $routes = $this->routesRepository->findWithoutFail($id);

        if (empty($routes)) {
            Flash::error('Routes not found');

            return redirect(route('routes.index'));
        }

        return view('routes.show')->with('routes', $routes);
    }

    /**
     * Show the form for editing the specified routes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $routes = $this->routesRepository->findWithoutFail($id);

        if (empty($routes)) {
            Flash::error('Routes not found');

            return redirect(route('routes.index'));
        }

        return view('routes.edit')->with('routes', $routes);
    }

    /**
     * Update the specified routes in storage.
     *
     * @param  int              $id
     * @param UpdateroutesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateroutesRequest $request)
    {
        $routes = $this->routesRepository->findWithoutFail($id);

        if (empty($routes)) {
            Flash::error('Routes not found');

            return redirect(route('routes.index'));
        }

        $routes = $this->routesRepository->update($request->all(), $id);

        Flash::success('Routes updated successfully.');

        return redirect(route('routes.index'));
    }

    /**
     * Remove the specified routes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $routes = $this->routesRepository->findWithoutFail($id);

        if (empty($routes)) {
            Flash::error('Routes not found');

            return redirect(route('routes.index'));
        }

        $this->routesRepository->delete($id);

        Flash::success('Routes deleted successfully.');

        return redirect(route('routes.index'));
    }
}
