<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedriversRequest;
use App\Http\Requests\UpdatedriversRequest;
use App\Repositories\driversRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class driversController extends AppBaseController
{
    /** @var  driversRepository */
    private $driversRepository;

    public function __construct(driversRepository $driversRepo)
    {
        $this->driversRepository = $driversRepo;
    }

    /**
     * Display a listing of the drivers.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->driversRepository->pushCriteria(new RequestCriteria($request));
        $drivers = $this->driversRepository->all();

        return view('drivers.index')
            ->with('drivers', $drivers);
    }

    /**
     * Show the form for creating a new drivers.
     *
     * @return Response
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created drivers in storage.
     *
     * @param CreatedriversRequest $request
     *
     * @return Response
     */
    public function store(CreatedriversRequest $request)
    {
        $input = $request->all();

        $drivers = $this->driversRepository->create($input);

        Flash::success('Drivers saved successfully.');

        return redirect(route('drivers.index'));
    }

    /**
     * Display the specified drivers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $drivers = $this->driversRepository->findWithoutFail($id);

        if (empty($drivers)) {
            Flash::error('Drivers not found');

            return redirect(route('drivers.index'));
        }

        return view('drivers.show')->with('drivers', $drivers);
    }

    /**
     * Show the form for editing the specified drivers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $drivers = $this->driversRepository->findWithoutFail($id);

        if (empty($drivers)) {
            Flash::error('Drivers not found');

            return redirect(route('drivers.index'));
        }

        return view('drivers.edit')->with('drivers', $drivers);
    }

    /**
     * Update the specified drivers in storage.
     *
     * @param  int              $id
     * @param UpdatedriversRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedriversRequest $request)
    {
        $drivers = $this->driversRepository->findWithoutFail($id);

        if (empty($drivers)) {
            Flash::error('Drivers not found');

            return redirect(route('drivers.index'));
        }

        $drivers = $this->driversRepository->update($request->all(), $id);

        Flash::success('Drivers updated successfully.');

        return redirect(route('drivers.index'));
    }

    /**
     * Remove the specified drivers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $drivers = $this->driversRepository->findWithoutFail($id);

        if (empty($drivers)) {
            Flash::error('Drivers not found');

            return redirect(route('drivers.index'));
        }

        $this->driversRepository->delete($id);

        Flash::success('Drivers deleted successfully.');

        return redirect(route('drivers.index'));
    }
}
