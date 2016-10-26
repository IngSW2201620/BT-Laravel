<?php

use Faker\Factory as Faker;
use App\Models\Administrador;
use App\Repositories\AdministradorRepository;

trait MakeAdministradorTrait
{
    /**
     * Create fake instance of Administrador and save it in database
     *
     * @param array $administradorFields
     * @return Administrador
     */
    public function makeAdministrador($administradorFields = [])
    {
        /** @var AdministradorRepository $administradorRepo */
        $administradorRepo = App::make(AdministradorRepository::class);
        $theme = $this->fakeAdministradorData($administradorFields);
        return $administradorRepo->create($theme);
    }

    /**
     * Get fake instance of Administrador
     *
     * @param array $administradorFields
     * @return Administrador
     */
    public function fakeAdministrador($administradorFields = [])
    {
        return new Administrador($this->fakeAdministradorData($administradorFields));
    }

    /**
     * Get fake data of Administrador
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAdministradorData($administradorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $administradorFields);
    }
}
