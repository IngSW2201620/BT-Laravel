<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesellersAPIRequest;
use App\Http\Requests\API\UpdatesellersAPIRequest;
use App\Models\sellers;
use App\Repositories\sellersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class sellersController
 * @package App\Http\Controllers\API
 */

class sellersAPIController extends AppBaseController
{
    /** @var  sellersRepository */
    private $sellersRepository;

    public function __construct(sellersRepository $sellersRepo)
    {
        $this->sellersRepository = $sellersRepo;
    }

    /**
     * Display a listing of the sellers.
     * GET|HEAD /sellers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sellersRepository->pushCriteria(new RequestCriteria($request));
        $this->sellersRepository->pushCriteria(new LimitOffsetCriteria($request));
        $sellers = $this->sellersRepository->all();

        return $this->sendResponse($sellers->toArray(), 'Sellers retrieved successfully');
    }

    /**
     * Store a newly created sellers in storage.
     * POST /sellers
     *
     * @param CreatesellersAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatesellersAPIRequest $request)
    {
        $input = $request->all();

        $sellers = $this->sellersRepository->create($input);

        return $this->sendResponse($sellers->toArray(), 'Sellers saved successfully');
    }

    /**
     * Display the specified sellers.
     * GET|HEAD /sellers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var sellers $sellers */
        $sellers = $this->sellersRepository->findWithoutFail($id);

        if (empty($sellers)) {
            return $this->sendError('Sellers not found');
        }

        return $this->sendResponse($sellers->toArray(), 'Sellers retrieved successfully');
    }

    /**
     * Update the specified sellers in storage.
     * PUT/PATCH /sellers/{id}
     *
     * @param  int $id
     * @param UpdatesellersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesellersAPIRequest $request)
    {
        $input = $request->all();

        /** @var sellers $sellers */
        $sellers = $this->sellersRepository->findWithoutFail($id);

        if (empty($sellers)) {
            return $this->sendError('Sellers not found');
        }

        $sellers = $this->sellersRepository->update($input, $id);

        return $this->sendResponse($sellers->toArray(), 'sellers updated successfully');
    }

    /**
     * Remove the specified sellers from storage.
     * DELETE /sellers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var sellers $sellers */
        $sellers = $this->sellersRepository->findWithoutFail($id);

        if (empty($sellers)) {
            return $this->sendError('Sellers not found');
        }

        $sellers->delete();

        return $this->sendResponse($id, 'Sellers deleted successfully');
    }
}
