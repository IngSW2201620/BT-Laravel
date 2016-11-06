<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatestopsRequest;
use App\Http\Requests\UpdatestopsRequest;
use App\Repositories\stopsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class stopsController extends AppBaseController
{
    /** @var  stopsRepository */
    private $stopsRepository;

    public function __construct(stopsRepository $stopsRepo)
    {
        $this->stopsRepository = $stopsRepo;
    }

    /**
     * Display a listing of the stops.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->stopsRepository->pushCriteria(new RequestCriteria($request));
        $stops = $this->stopsRepository->all();

        return view('stops.index')
            ->with('stops', $stops);
    }

    /**
     * Show the form for creating a new stops.
     *
     * @return Response
     */
    public function create()
    {
        return view('stops.create');
    }

    /**
     * Store a newly created stops in storage.
     *
     * @param CreatestopsRequest $request
     *
     * @return Response
     */
    public function store(CreatestopsRequest $request)
    {
        $input = $request->all();

        $stops = $this->stopsRepository->create($input);

        Flash::success('Stops saved successfully.');

        return redirect(route('stops.index'));
    }

    /**
     * Display the specified stops.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stops = $this->stopsRepository->findWithoutFail($id);

        if (empty($stops)) {
            Flash::error('Stops not found');

            return redirect(route('stops.index'));
        }

        return view('stops.show')->with('stops', $stops);
    }

    /**
     * Show the form for editing the specified stops.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stops = $this->stopsRepository->findWithoutFail($id);

        if (empty($stops)) {
            Flash::error('Stops not found');

            return redirect(route('stops.index'));
        }

        return view('stops.edit')->with('stops', $stops);
    }

    /**
     * Update the specified stops in storage.
     *
     * @param  int              $id
     * @param UpdatestopsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestopsRequest $request)
    {
        $stops = $this->stopsRepository->findWithoutFail($id);

        if (empty($stops)) {
            Flash::error('Stops not found');

            return redirect(route('stops.index'));
        }

        $stops = $this->stopsRepository->update($request->all(), $id);

        Flash::success('Stops updated successfully.');

        return redirect(route('stops.index'));
    }

    /**
     * Remove the specified stops from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stops = $this->stopsRepository->findWithoutFail($id);

        if (empty($stops)) {
            Flash::error('Stops not found');

            return redirect(route('stops.index'));
        }

        $this->stopsRepository->delete($id);

        Flash::success('Stops deleted successfully.');

        return redirect(route('stops.index'));
    }
}
