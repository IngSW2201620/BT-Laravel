<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class routesApiTest extends TestCase
{
    use MakeroutesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateroutes()
    {
        $routes = $this->fakeroutesData();
        $this->json('POST', '/api/v1/routes', $routes);

        $this->assertApiResponse($routes);
    }

    /**
     * @test
     */
    public function testReadroutes()
    {
        $routes = $this->makeroutes();
        $this->json('GET', '/api/v1/routes/'.$routes->id);

        $this->assertApiResponse($routes->toArray());
    }

    /**
     * @test
     */
    public function testUpdateroutes()
    {
        $routes = $this->makeroutes();
        $editedroutes = $this->fakeroutesData();

        $this->json('PUT', '/api/v1/routes/'.$routes->id, $editedroutes);

        $this->assertApiResponse($editedroutes);
    }

    /**
     * @test
     */
    public function testDeleteroutes()
    {
        $routes = $this->makeroutes();
        $this->json('DELETE', '/api/v1/routes/'.$routes->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/routes/'.$routes->id);

        $this->assertResponseStatus(404);
    }
}
