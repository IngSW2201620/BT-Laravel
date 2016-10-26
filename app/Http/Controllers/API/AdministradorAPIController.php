<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAdministradorAPIRequest;
use App\Http\Requests\API\UpdateAdministradorAPIRequest;
use App\Models\Administrador;
use App\Repositories\AdministradorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AdministradorController
 * @package App\Http\Controllers\API
 */

class AdministradorAPIController extends AppBaseController
{
    /** @var  AdministradorRepository */
    private $administradorRepository;

    public function __construct(AdministradorRepository $administradorRepo)
    {
        $this->administradorRepository = $administradorRepo;
    }

    /**
     * Display a listing of the Administrador.
     * GET|HEAD /administradors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->administradorRepository->pushCriteria(new RequestCriteria($request));
        $this->administradorRepository->pushCriteria(new LimitOffsetCriteria($request));
        $administradors = $this->administradorRepository->all();

        return $this->sendResponse($administradors->toArray(), 'Administradors retrieved successfully');
    }

    /**
     * Store a newly created Administrador in storage.
     * POST /administradors
     *
     * @param CreateAdministradorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAdministradorAPIRequest $request)
    {
        $input = $request->all();

        $administradors = $this->administradorRepository->create($input);

        return $this->sendResponse($administradors->toArray(), 'Administrador saved successfully');
    }

    /**
     * Display the specified Administrador.
     * GET|HEAD /administradors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Administrador $administrador */
        $administrador = $this->administradorRepository->findWithoutFail($id);

        if (empty($administrador)) {
            return $this->sendError('Administrador not found');
        }

        return $this->sendResponse($administrador->toArray(), 'Administrador retrieved successfully');
    }

    /**
     * Update the specified Administrador in storage.
     * PUT/PATCH /administradors/{id}
     *
     * @param  int $id
     * @param UpdateAdministradorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdministradorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Administrador $administrador */
        $administrador = $this->administradorRepository->findWithoutFail($id);

        if (empty($administrador)) {
            return $this->sendError('Administrador not found');
        }

        $administrador = $this->administradorRepository->update($input, $id);

        return $this->sendResponse($administrador->toArray(), 'Administrador updated successfully');
    }

    /**
     * Remove the specified Administrador from storage.
     * DELETE /administradors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Administrador $administrador */
        $administrador = $this->administradorRepository->findWithoutFail($id);

        if (empty($administrador)) {
            return $this->sendError('Administrador not found');
        }

        $administrador->delete();

        return $this->sendResponse($id, 'Administrador deleted successfully');
    }
}
