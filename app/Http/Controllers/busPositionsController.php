<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatebusPositionsRequest;
use App\Http\Requests\UpdatebusPositionsRequest;
use App\Repositories\busPositionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class busPositionsController extends AppBaseController
{
    /** @var  busPositionsRepository */
    private $busPositionsRepository;

    public function __construct(busPositionsRepository $busPositionsRepo)
    {
        $this->busPositionsRepository = $busPositionsRepo;
    }

    /**
     * Display a listing of the busPositions.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->busPositionsRepository->pushCriteria(new RequestCriteria($request));
        $busPositions = $this->busPositionsRepository->all();

        return view('bus_positions.index')
            ->with('busPositions', $busPositions);
    }

    /**
     * Show the form for creating a new busPositions.
     *
     * @return Response
     */
    public function create()
    {
        return view('bus_positions.create');
    }

    /**
     * Store a newly created busPositions in storage.
     *
     * @param CreatebusPositionsRequest $request
     *
     * @return Response
     */
    public function store(CreatebusPositionsRequest $request)
    {
        $input = $request->all();

        $busPositions = $this->busPositionsRepository->create($input);

        Flash::success('Bus Positions saved successfully.');

        return redirect(route('busPositions.index'));
    }

    /**
     * Display the specified busPositions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $busPositions = $this->busPositionsRepository->findWithoutFail($id);

        if (empty($busPositions)) {
            Flash::error('Bus Positions not found');

            return redirect(route('busPositions.index'));
        }

        return view('bus_positions.show')->with('busPositions', $busPositions);
    }

    /**
     * Show the form for editing the specified busPositions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $busPositions = $this->busPositionsRepository->findWithoutFail($id);

        if (empty($busPositions)) {
            Flash::error('Bus Positions not found');

            return redirect(route('busPositions.index'));
        }

        return view('bus_positions.edit')->with('busPositions', $busPositions);
    }

    /**
     * Update the specified busPositions in storage.
     *
     * @param  int              $id
     * @param UpdatebusPositionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebusPositionsRequest $request)
    {
        $busPositions = $this->busPositionsRepository->findWithoutFail($id);

        if (empty($busPositions)) {
            Flash::error('Bus Positions not found');

            return redirect(route('busPositions.index'));
        }

        $busPositions = $this->busPositionsRepository->update($request->all(), $id);

        Flash::success('Bus Positions updated successfully.');

        return redirect(route('busPositions.index'));
    }

    /**
     * Remove the specified busPositions from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $busPositions = $this->busPositionsRepository->findWithoutFail($id);

        if (empty($busPositions)) {
            Flash::error('Bus Positions not found');

            return redirect(route('busPositions.index'));
        }

        $this->busPositionsRepository->delete($id);

        Flash::success('Bus Positions deleted successfully.');

        return redirect(route('busPositions.index'));
    }
}
