<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateroadRequest;
use App\Http\Requests\UpdateroadRequest;
use App\Repositories\roadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class roadController extends AppBaseController
{
    /** @var  roadRepository */
    private $roadRepository;

    public function __construct(roadRepository $roadRepo)
    {
        $this->roadRepository = $roadRepo;
    }

    /**
     * Display a listing of the road.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roadRepository->pushCriteria(new RequestCriteria($request));
        $roads = $this->roadRepository->all();

        return view('roads.index')
            ->with('roads', $roads);
    }

    /**
     * Show the form for creating a new road.
     *
     * @return Response
     */
    public function create()
    {
        return view('roads.create');
    }

    /**
     * Store a newly created road in storage.
     *
     * @param CreateroadRequest $request
     *
     * @return Response
     */
    public function store(CreateroadRequest $request)
    {
        $input = $request->all();

        $road = $this->roadRepository->create($input);

        Flash::success('Road saved successfully.');

        return redirect(route('roads.index'));
    }

    /**
     * Display the specified road.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $road = $this->roadRepository->findWithoutFail($id);

        if (empty($road)) {
            Flash::error('Road not found');

            return redirect(route('roads.index'));
        }

        return view('roads.show')->with('road', $road);
    }

    /**
     * Show the form for editing the specified road.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $road = $this->roadRepository->findWithoutFail($id);

        if (empty($road)) {
            Flash::error('Road not found');

            return redirect(route('roads.index'));
        }

        return view('roads.edit')->with('road', $road);
    }

    /**
     * Update the specified road in storage.
     *
     * @param  int              $id
     * @param UpdateroadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateroadRequest $request)
    {
        $road = $this->roadRepository->findWithoutFail($id);

        if (empty($road)) {
            Flash::error('Road not found');

            return redirect(route('roads.index'));
        }

        $road = $this->roadRepository->update($request->all(), $id);

        Flash::success('Road updated successfully.');

        return redirect(route('roads.index'));
    }

    /**
     * Remove the specified road from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $road = $this->roadRepository->findWithoutFail($id);

        if (empty($road)) {
            Flash::error('Road not found');

            return redirect(route('roads.index'));
        }

        $this->roadRepository->delete($id);

        Flash::success('Road deleted successfully.');

        return redirect(route('roads.index'));
    }
}
