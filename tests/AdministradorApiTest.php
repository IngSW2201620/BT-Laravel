<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdministradorApiTest extends TestCase
{
    use MakeAdministradorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAdministrador()
    {
        $administrador = $this->fakeAdministradorData();
        $this->json('POST', '/api/v1/administradors', $administrador);

        $this->assertApiResponse($administrador);
    }

    /**
     * @test
     */
    public function testReadAdministrador()
    {
        $administrador = $this->makeAdministrador();
        $this->json('GET', '/api/v1/administradors/'.$administrador->id);

        $this->assertApiResponse($administrador->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAdministrador()
    {
        $administrador = $this->makeAdministrador();
        $editedAdministrador = $this->fakeAdministradorData();

        $this->json('PUT', '/api/v1/administradors/'.$administrador->id, $editedAdministrador);

        $this->assertApiResponse($editedAdministrador);
    }

    /**
     * @test
     */
    public function testDeleteAdministrador()
    {
        $administrador = $this->makeAdministrador();
        $this->json('DELETE', '/api/v1/administradors/'.$administrador->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/administradors/'.$administrador->id);

        $this->assertResponseStatus(404);
    }
}
