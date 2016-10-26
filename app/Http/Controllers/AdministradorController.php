<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdministradorRequest;
use App\Http\Requests\UpdateAdministradorRequest;
use App\Repositories\AdministradorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AdministradorController extends AppBaseController
{
    /** @var  AdministradorRepository */
    private $administradorRepository;

    public function __construct(AdministradorRepository $administradorRepo)
    {
        $this->administradorRepository = $administradorRepo;
    }

    /**
     * Display a listing of the Administrador.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->administradorRepository->pushCriteria(new RequestCriteria($request));
        $administradors = $this->administradorRepository->all();

        return view('administradors.index')
            ->with('administradors', $administradors);
    }

    /**
     * Show the form for creating a new Administrador.
     *
     * @return Response
     */
    public function create()
    {
        return view('administradors.create');
    }

    /**
     * Store a newly created Administrador in storage.
     *
     * @param CreateAdministradorRequest $request
     *
     * @return Response
     */
    public function store(CreateAdministradorRequest $request)
    {
        $input = $request->all();

        $administrador = $this->administradorRepository->create($input);

        Flash::success('Administrador saved successfully.');

        return redirect(route('administradors.index'));
    }

    /**
     * Display the specified Administrador.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $administrador = $this->administradorRepository->findWithoutFail($id);

        if (empty($administrador)) {
            Flash::error('Administrador not found');

            return redirect(route('administradors.index'));
        }

        return view('administradors.show')->with('administrador', $administrador);
    }

    /**
     * Show the form for editing the specified Administrador.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $administrador = $this->administradorRepository->findWithoutFail($id);

        if (empty($administrador)) {
            Flash::error('Administrador not found');

            return redirect(route('administradors.index'));
        }

        return view('administradors.edit')->with('administrador', $administrador);
    }

    /**
     * Update the specified Administrador in storage.
     *
     * @param  int              $id
     * @param UpdateAdministradorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdministradorRequest $request)
    {
        $administrador = $this->administradorRepository->findWithoutFail($id);

        if (empty($administrador)) {
            Flash::error('Administrador not found');

            return redirect(route('administradors.index'));
        }

        $administrador = $this->administradorRepository->update($request->all(), $id);

        Flash::success('Administrador updated successfully.');

        return redirect(route('administradors.index'));
    }

    /**
     * Remove the specified Administrador from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $administrador = $this->administradorRepository->findWithoutFail($id);

        if (empty($administrador)) {
            Flash::error('Administrador not found');

            return redirect(route('administradors.index'));
        }

        $this->administradorRepository->delete($id);

        Flash::success('Administrador deleted successfully.');

        return redirect(route('administradors.index'));
    }
}
