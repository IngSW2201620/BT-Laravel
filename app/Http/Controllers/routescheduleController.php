<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateroutescheduleRequest;
use App\Http\Requests\UpdateroutescheduleRequest;
use App\Repositories\routescheduleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class routescheduleController extends AppBaseController
{
    /** @var  routescheduleRepository */
    private $routescheduleRepository;

    public function __construct(routescheduleRepository $routescheduleRepo)
    {
        $this->routescheduleRepository = $routescheduleRepo;
    }

    /**
     * Display a listing of the routeschedule.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->routescheduleRepository->pushCriteria(new RequestCriteria($request));
        $routeschedules = $this->routescheduleRepository->all();

        return view('routeschedules.index')
            ->with('routeschedules', $routeschedules);
    }

    /**
     * Show the form for creating a new routeschedule.
     *
     * @return Response
     */
    public function create()
    {
        return view('routeschedules.create');
    }

    /**
     * Store a newly created routeschedule in storage.
     *
     * @param CreateroutescheduleRequest $request
     *
     * @return Response
     */
    public function store(CreateroutescheduleRequest $request)
    {
        $input = $request->all();

        $routeschedule = $this->routescheduleRepository->create($input);

        Flash::success('Routeschedule saved successfully.');

        return redirect(route('routeschedules.index'));
    }

    /**
     * Display the specified routeschedule.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $routeschedule = $this->routescheduleRepository->findWithoutFail($id);

        if (empty($routeschedule)) {
            Flash::error('Routeschedule not found');

            return redirect(route('routeschedules.index'));
        }

        return view('routeschedules.show')->with('routeschedule', $routeschedule);
    }

    /**
     * Show the form for editing the specified routeschedule.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $routeschedule = $this->routescheduleRepository->findWithoutFail($id);

        if (empty($routeschedule)) {
            Flash::error('Routeschedule not found');

            return redirect(route('routeschedules.index'));
        }

        return view('routeschedules.edit')->with('routeschedule', $routeschedule);
    }

    /**
     * Update the specified routeschedule in storage.
     *
     * @param  int              $id
     * @param UpdateroutescheduleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateroutescheduleRequest $request)
    {
        $routeschedule = $this->routescheduleRepository->findWithoutFail($id);

        if (empty($routeschedule)) {
            Flash::error('Routeschedule not found');

            return redirect(route('routeschedules.index'));
        }

        $routeschedule = $this->routescheduleRepository->update($request->all(), $id);

        Flash::success('Routeschedule updated successfully.');

        return redirect(route('routeschedules.index'));
    }

    /**
     * Remove the specified routeschedule from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $routeschedule = $this->routescheduleRepository->findWithoutFail($id);

        if (empty($routeschedule)) {
            Flash::error('Routeschedule not found');

            return redirect(route('routeschedules.index'));
        }

        $this->routescheduleRepository->delete($id);

        Flash::success('Routeschedule deleted successfully.');

        return redirect(route('routeschedules.index'));
    }
}
