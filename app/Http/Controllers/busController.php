<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatebusRequest;
use App\Http\Requests\UpdatebusRequest;
use App\Repositories\busRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class busController extends AppBaseController
{
    /** @var  busRepository */
    private $busRepository;

    public function __construct(busRepository $busRepo)
    {
        $this->busRepository = $busRepo;
    }

    /**
     * Display a listing of the bus.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->busRepository->pushCriteria(new RequestCriteria($request));
        $buses = $this->busRepository->all();

        return view('buses.index')
            ->with('buses', $buses);
    }

    /**
     * Show the form for creating a new bus.
     *
     * @return Response
     */
    public function create()
    {
        return view('buses.create');
    }

    /**
     * Store a newly created bus in storage.
     *
     * @param CreatebusRequest $request
     *
     * @return Response
     */
    public function store(CreatebusRequest $request)
    {
        $input = $request->all();

        $bus = $this->busRepository->create($input);

        Flash::success('Bus saved successfully.');

        return redirect(route('buses.index'));
    }

    /**
     * Display the specified bus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bus = $this->busRepository->findWithoutFail($id);

        if (empty($bus)) {
            Flash::error('Bus not found');

            return redirect(route('buses.index'));
        }

        return view('buses.show')->with('bus', $bus);
    }

    /**
     * Show the form for editing the specified bus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bus = $this->busRepository->findWithoutFail($id);

        if (empty($bus)) {
            Flash::error('Bus not found');

            return redirect(route('buses.index'));
        }

        return view('buses.edit')->with('bus', $bus);
    }

    /**
     * Update the specified bus in storage.
     *
     * @param  int              $id
     * @param UpdatebusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebusRequest $request)
    {
        $bus = $this->busRepository->findWithoutFail($id);

        if (empty($bus)) {
            Flash::error('Bus not found');

            return redirect(route('buses.index'));
        }

        $bus = $this->busRepository->update($request->all(), $id);

        Flash::success('Bus updated successfully.');

        return redirect(route('buses.index'));
    }

    /**
     * Remove the specified bus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bus = $this->busRepository->findWithoutFail($id);

        if (empty($bus)) {
            Flash::error('Bus not found');

            return redirect(route('buses.index'));
        }

        $this->busRepository->delete($id);

        Flash::success('Bus deleted successfully.');

        return redirect(route('buses.index'));
    }
}
