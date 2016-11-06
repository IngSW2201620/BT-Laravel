<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateticketsRequest;
use App\Http\Requests\UpdateticketsRequest;
use App\Repositories\ticketsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ticketsController extends AppBaseController
{
    /** @var  ticketsRepository */
    private $ticketsRepository;

    public function __construct(ticketsRepository $ticketsRepo)
    {
        $this->ticketsRepository = $ticketsRepo;
    }

    /**
     * Display a listing of the tickets.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ticketsRepository->pushCriteria(new RequestCriteria($request));
        $tickets = $this->ticketsRepository->all();

        return view('tickets.index')
            ->with('tickets', $tickets);
    }

    /**
     * Show the form for creating a new tickets.
     *
     * @return Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created tickets in storage.
     *
     * @param CreateticketsRequest $request
     *
     * @return Response
     */
    public function store(CreateticketsRequest $request)
    {
        $input = $request->all();

        $tickets = $this->ticketsRepository->create($input);

        Flash::success('Tickets saved successfully.');

        return redirect(route('tickets.index'));
    }

    /**
     * Display the specified tickets.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tickets = $this->ticketsRepository->findWithoutFail($id);

        if (empty($tickets)) {
            Flash::error('Tickets not found');

            return redirect(route('tickets.index'));
        }

        return view('tickets.show')->with('tickets', $tickets);
    }

    /**
     * Show the form for editing the specified tickets.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tickets = $this->ticketsRepository->findWithoutFail($id);

        if (empty($tickets)) {
            Flash::error('Tickets not found');

            return redirect(route('tickets.index'));
        }

        return view('tickets.edit')->with('tickets', $tickets);
    }

    /**
     * Update the specified tickets in storage.
     *
     * @param  int              $id
     * @param UpdateticketsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateticketsRequest $request)
    {
        $tickets = $this->ticketsRepository->findWithoutFail($id);

        if (empty($tickets)) {
            Flash::error('Tickets not found');

            return redirect(route('tickets.index'));
        }

        $tickets = $this->ticketsRepository->update($request->all(), $id);

        Flash::success('Tickets updated successfully.');

        return redirect(route('tickets.index'));
    }

    /**
     * Remove the specified tickets from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tickets = $this->ticketsRepository->findWithoutFail($id);

        if (empty($tickets)) {
            Flash::error('Tickets not found');

            return redirect(route('tickets.index'));
        }

        $this->ticketsRepository->delete($id);

        Flash::success('Tickets deleted successfully.');

        return redirect(route('tickets.index'));
    }
}
