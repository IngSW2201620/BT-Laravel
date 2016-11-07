<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatebusesRequest;
use App\Http\Requests\UpdatebusesRequest;
use App\Repositories\busesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class busesController extends AppBaseController
{
    /** @var  busesRepository */
    private $busesRepository;

    public function __construct(busesRepository $busesRepo)
    {
        $this->busesRepository = $busesRepo;
    }

    /**
     * Display a listing of the buses.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->busesRepository->pushCriteria(new RequestCriteria($request));
        $buses = $this->busesRepository->all();

        /** Desactivado por JDV
        return view('buses.index')
            ->with('buses', $buses);
        */  
            return response()
            ->json(['buses', $buses])
            ->withCallback($request->input('callback'));
    }



    /**
     * Show the form for creating a new buses.
     *
     * @return Response
     */
    public function create()
    {
        return view('buses.create');
    }

    /**
     * Store a newly created buses in storage.
     *
     * @param CreatebusesRequest $request
     *
     * @return Response
     */
    public function store(CreatebusesRequest $request)
    {
        $input = $request->all();

        $buses = $this->busesRepository->create($input);

        Flash::success('Buses saved successfully.');

        return redirect(route('buses.index'));
    }

    /**
     * Display the specified buses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $buses = $this->busesRepository->findWithoutFail($id);

        if (empty($buses)) {
            Flash::error('Buses not found');

            return redirect(route('buses.index'));
        }
        /** Desactivado por JDV
        return view('buses.show')->with('buses', $buses);
        */

        return response()->json(['buses', $buses ]);
    }

    /**
     * Show the form for editing the specified buses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $buses = $this->busesRepository->findWithoutFail($id);

        if (empty($buses)) {
            Flash::error('Buses not found');

            return redirect(route('buses.index'));
        }

        return view('buses.edit')->with('buses', $buses);
    }

    /**
     * Update the specified buses in storage.
     *
     * @param  int              $id
     * @param UpdatebusesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebusesRequest $request)
    {
        $buses = $this->busesRepository->findWithoutFail($id);

        if (empty($buses)) {
            Flash::error('Buses not found');

            return redirect(route('buses.index'));
        }

        $buses = $this->busesRepository->update($request->all(), $id);

        Flash::success('Buses updated successfully.');

        return redirect(route('buses.index'));
    }

    /**
     * Remove the specified buses from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $buses = $this->busesRepository->findWithoutFail($id);

        if (empty($buses)) {
            Flash::error('Buses not found');

            return redirect(route('buses.index'));
        }

        $this->busesRepository->delete($id);

        Flash::success('Buses deleted successfully.');

        return redirect(route('buses.index'));
    }
}
