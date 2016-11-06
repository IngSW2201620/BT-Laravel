<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesellersRequest;
use App\Http\Requests\UpdatesellersRequest;
use App\Repositories\sellersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class sellersController extends AppBaseController
{
    /** @var  sellersRepository */
    private $sellersRepository;

    public function __construct(sellersRepository $sellersRepo)
    {
        $this->sellersRepository = $sellersRepo;
    }

    /**
     * Display a listing of the sellers.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sellersRepository->pushCriteria(new RequestCriteria($request));
        $sellers = $this->sellersRepository->all();

        return view('sellers.index')
            ->with('sellers', $sellers);
    }

    /**
     * Show the form for creating a new sellers.
     *
     * @return Response
     */
    public function create()
    {
        return view('sellers.create');
    }

    /**
     * Store a newly created sellers in storage.
     *
     * @param CreatesellersRequest $request
     *
     * @return Response
     */
    public function store(CreatesellersRequest $request)
    {
        $input = $request->all();

        $sellers = $this->sellersRepository->create($input);

        Flash::success('Sellers saved successfully.');

        return redirect(route('sellers.index'));
    }

    /**
     * Display the specified sellers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sellers = $this->sellersRepository->findWithoutFail($id);

        if (empty($sellers)) {
            Flash::error('Sellers not found');

            return redirect(route('sellers.index'));
        }

        return view('sellers.show')->with('sellers', $sellers);
    }

    /**
     * Show the form for editing the specified sellers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sellers = $this->sellersRepository->findWithoutFail($id);

        if (empty($sellers)) {
            Flash::error('Sellers not found');

            return redirect(route('sellers.index'));
        }

        return view('sellers.edit')->with('sellers', $sellers);
    }

    /**
     * Update the specified sellers in storage.
     *
     * @param  int              $id
     * @param UpdatesellersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesellersRequest $request)
    {
        $sellers = $this->sellersRepository->findWithoutFail($id);

        if (empty($sellers)) {
            Flash::error('Sellers not found');

            return redirect(route('sellers.index'));
        }

        $sellers = $this->sellersRepository->update($request->all(), $id);

        Flash::success('Sellers updated successfully.');

        return redirect(route('sellers.index'));
    }

    /**
     * Remove the specified sellers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sellers = $this->sellersRepository->findWithoutFail($id);

        if (empty($sellers)) {
            Flash::error('Sellers not found');

            return redirect(route('sellers.index'));
        }

        $this->sellersRepository->delete($id);

        Flash::success('Sellers deleted successfully.');

        return redirect(route('sellers.index'));
    }
}
