<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateroadStopsRequest;
use App\Http\Requests\UpdateroadStopsRequest;
use App\Repositories\roadStopsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class roadStopsController extends AppBaseController
{
    /** @var  roadStopsRepository */
    private $roadStopsRepository;

    public function __construct(roadStopsRepository $roadStopsRepo)
    {
        $this->roadStopsRepository = $roadStopsRepo;
    }

    /**
     * Display a listing of the roadStops.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roadStopsRepository->pushCriteria(new RequestCriteria($request));
        $roadStops = $this->roadStopsRepository->all();

        return view('road_stops.index')
            ->with('roadStops', $roadStops);
    }

    /**
     * Show the form for creating a new roadStops.
     *
     * @return Response
     */
    public function create()
    {
        return view('road_stops.create');
    }

    /**
     * Store a newly created roadStops in storage.
     *
     * @param CreateroadStopsRequest $request
     *
     * @return Response
     */
    public function store(CreateroadStopsRequest $request)
    {
        $input = $request->all();

        $roadStops = $this->roadStopsRepository->create($input);

        Flash::success('Road Stops saved successfully.');

        return redirect(route('roadStops.index'));
    }

    /**
     * Display the specified roadStops.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roadStops = $this->roadStopsRepository->findWithoutFail($id);

        if (empty($roadStops)) {
            Flash::error('Road Stops not found');

            return redirect(route('roadStops.index'));
        }

        return view('road_stops.show')->with('roadStops', $roadStops);
    }

    /**
     * Show the form for editing the specified roadStops.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roadStops = $this->roadStopsRepository->findWithoutFail($id);

        if (empty($roadStops)) {
            Flash::error('Road Stops not found');

            return redirect(route('roadStops.index'));
        }

        return view('road_stops.edit')->with('roadStops', $roadStops);
    }

    /**
     * Update the specified roadStops in storage.
     *
     * @param  int              $id
     * @param UpdateroadStopsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateroadStopsRequest $request)
    {
        $roadStops = $this->roadStopsRepository->findWithoutFail($id);

        if (empty($roadStops)) {
            Flash::error('Road Stops not found');

            return redirect(route('roadStops.index'));
        }

        $roadStops = $this->roadStopsRepository->update($request->all(), $id);

        Flash::success('Road Stops updated successfully.');

        return redirect(route('roadStops.index'));
    }

    /**
     * Remove the specified roadStops from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roadStops = $this->roadStopsRepository->findWithoutFail($id);

        if (empty($roadStops)) {
            Flash::error('Road Stops not found');

            return redirect(route('roadStops.index'));
        }

        $this->roadStopsRepository->delete($id);

        Flash::success('Road Stops deleted successfully.');

        return redirect(route('roadStops.index'));
    }
}
