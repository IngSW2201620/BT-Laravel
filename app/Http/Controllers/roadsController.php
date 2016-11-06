<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateroadsRequest;
use App\Http\Requests\UpdateroadsRequest;
use App\Repositories\roadsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class roadsController extends AppBaseController
{
    /** @var  roadsRepository */
    private $roadsRepository;

    public function __construct(roadsRepository $roadsRepo)
    {
        $this->roadsRepository = $roadsRepo;
    }

    /**
     * Display a listing of the roads.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roadsRepository->pushCriteria(new RequestCriteria($request));
        $roads = $this->roadsRepository->all();

        return view('roads.index')
            ->with('roads', $roads);
    }

    /**
     * Show the form for creating a new roads.
     *
     * @return Response
     */
    public function create()
    {
        return view('roads.create');
    }

    /**
     * Store a newly created roads in storage.
     *
     * @param CreateroadsRequest $request
     *
     * @return Response
     */
    public function store(CreateroadsRequest $request)
    {
        $input = $request->all();

        $roads = $this->roadsRepository->create($input);

        Flash::success('Roads saved successfully.');

        return redirect(route('roads.index'));
    }

    /**
     * Display the specified roads.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roads = $this->roadsRepository->findWithoutFail($id);

        if (empty($roads)) {
            Flash::error('Roads not found');

            return redirect(route('roads.index'));
        }

        return view('roads.show')->with('roads', $roads);
    }

    /**
     * Show the form for editing the specified roads.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roads = $this->roadsRepository->findWithoutFail($id);

        if (empty($roads)) {
            Flash::error('Roads not found');

            return redirect(route('roads.index'));
        }

        return view('roads.edit')->with('roads', $roads);
    }

    /**
     * Update the specified roads in storage.
     *
     * @param  int              $id
     * @param UpdateroadsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateroadsRequest $request)
    {
        $roads = $this->roadsRepository->findWithoutFail($id);

        if (empty($roads)) {
            Flash::error('Roads not found');

            return redirect(route('roads.index'));
        }

        $roads = $this->roadsRepository->update($request->all(), $id);

        Flash::success('Roads updated successfully.');

        return redirect(route('roads.index'));
    }

    /**
     * Remove the specified roads from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roads = $this->roadsRepository->findWithoutFail($id);

        if (empty($roads)) {
            Flash::error('Roads not found');

            return redirect(route('roads.index'));
        }

        $this->roadsRepository->delete($id);

        Flash::success('Roads deleted successfully.');

        return redirect(route('roads.index'));
    }
}
