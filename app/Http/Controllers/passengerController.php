<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepassengerRequest;
use App\Http\Requests\UpdatepassengerRequest;
use App\Repositories\passengerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class passengerController extends AppBaseController
{
    /** @var  passengerRepository */
    private $passengerRepository;

    public function __construct(passengerRepository $passengerRepo)
    {
        $this->passengerRepository = $passengerRepo;
    }

    /**
     * Display a listing of the passenger.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->passengerRepository->pushCriteria(new RequestCriteria($request));
        $passengers = $this->passengerRepository->all();

        return view('passengers.index')
            ->with('passengers', $passengers);
    }

    /**
     * Show the form for creating a new passenger.
     *
     * @return Response
     */
    public function create()
    {
        return view('passengers.create');
    }

    /**
     * Store a newly created passenger in storage.
     *
     * @param CreatepassengerRequest $request
     *
     * @return Response
     */
    public function store(CreatepassengerRequest $request)
    {
        $input = $request->all();

        $passenger = $this->passengerRepository->create($input);

        Flash::success('Passenger saved successfully.');

        return redirect(route('passengers.index'));
    }

    /**
     * Display the specified passenger.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $passenger = $this->passengerRepository->findWithoutFail($id);

        if (empty($passenger)) {
            Flash::error('Passenger not found');

            return redirect(route('passengers.index'));
        }

        return view('passengers.show')->with('passenger', $passenger);
    }

    /**
     * Show the form for editing the specified passenger.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $passenger = $this->passengerRepository->findWithoutFail($id);

        if (empty($passenger)) {
            Flash::error('Passenger not found');

            return redirect(route('passengers.index'));
        }

        return view('passengers.edit')->with('passenger', $passenger);
    }

    /**
     * Update the specified passenger in storage.
     *
     * @param  int              $id
     * @param UpdatepassengerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepassengerRequest $request)
    {
        $passenger = $this->passengerRepository->findWithoutFail($id);

        if (empty($passenger)) {
            Flash::error('Passenger not found');

            return redirect(route('passengers.index'));
        }

        $passenger = $this->passengerRepository->update($request->all(), $id);

        Flash::success('Passenger updated successfully.');

        return redirect(route('passengers.index'));
    }

    /**
     * Remove the specified passenger from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $passenger = $this->passengerRepository->findWithoutFail($id);

        if (empty($passenger)) {
            Flash::error('Passenger not found');

            return redirect(route('passengers.index'));
        }

        $this->passengerRepository->delete($id);

        Flash::success('Passenger deleted successfully.');

        return redirect(route('passengers.index'));
    }
}
