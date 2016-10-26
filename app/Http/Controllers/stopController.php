<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatestopRequest;
use App\Http\Requests\UpdatestopRequest;
use App\Repositories\stopRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class stopController extends AppBaseController
{
    /** @var  stopRepository */
    private $stopRepository;

    public function __construct(stopRepository $stopRepo)
    {
        $this->stopRepository = $stopRepo;
    }

    /**
     * Display a listing of the stop.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->stopRepository->pushCriteria(new RequestCriteria($request));
        $stops = $this->stopRepository->all();

        return view('stops.index')
            ->with('stops', $stops);
    }

    /**
     * Show the form for creating a new stop.
     *
     * @return Response
     */
    public function create()
    {
        return view('stops.create');
    }

    /**
     * Store a newly created stop in storage.
     *
     * @param CreatestopRequest $request
     *
     * @return Response
     */
    public function store(CreatestopRequest $request)
    {
        $input = $request->all();

        $stop = $this->stopRepository->create($input);

        Flash::success('Stop saved successfully.');

        return redirect(route('stops.index'));
    }

    /**
     * Display the specified stop.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stop = $this->stopRepository->findWithoutFail($id);

        if (empty($stop)) {
            Flash::error('Stop not found');

            return redirect(route('stops.index'));
        }

        return view('stops.show')->with('stop', $stop);
    }

    /**
     * Show the form for editing the specified stop.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stop = $this->stopRepository->findWithoutFail($id);

        if (empty($stop)) {
            Flash::error('Stop not found');

            return redirect(route('stops.index'));
        }

        return view('stops.edit')->with('stop', $stop);
    }

    /**
     * Update the specified stop in storage.
     *
     * @param  int              $id
     * @param UpdatestopRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestopRequest $request)
    {
        $stop = $this->stopRepository->findWithoutFail($id);

        if (empty($stop)) {
            Flash::error('Stop not found');

            return redirect(route('stops.index'));
        }

        $stop = $this->stopRepository->update($request->all(), $id);

        Flash::success('Stop updated successfully.');

        return redirect(route('stops.index'));
    }

    /**
     * Remove the specified stop from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stop = $this->stopRepository->findWithoutFail($id);

        if (empty($stop)) {
            Flash::error('Stop not found');

            return redirect(route('stops.index'));
        }

        $this->stopRepository->delete($id);

        Flash::success('Stop deleted successfully.');

        return redirect(route('stops.index'));
    }
}
