<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class driverApiTest extends TestCase
{
    use MakedriverTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatedriver()
    {
        $driver = $this->fakedriverData();
        $this->json('POST', '/api/v1/drivers', $driver);

        $this->assertApiResponse($driver);
    }

    /**
     * @test
     */
    public function testReaddriver()
    {
        $driver = $this->makedriver();
        $this->json('GET', '/api/v1/drivers/'.$driver->id);

        $this->assertApiResponse($driver->toArray());
    }

    /**
     * @test
     */
    public function testUpdatedriver()
    {
        $driver = $this->makedriver();
        $editeddriver = $this->fakedriverData();

        $this->json('PUT', '/api/v1/drivers/'.$driver->id, $editeddriver);

        $this->assertApiResponse($editeddriver);
    }

    /**
     * @test
     */
    public function testDeletedriver()
    {
        $driver = $this->makedriver();
        $this->json('DELETE', '/api/v1/drivers/'.$driver->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/drivers/'.$driver->id);

        $this->assertResponseStatus(404);
    }
}
