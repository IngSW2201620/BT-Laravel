<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class driversApiTest extends TestCase
{
    use MakedriversTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatedrivers()
    {
        $drivers = $this->fakedriversData();
        $this->json('POST', '/api/v1/drivers', $drivers);

        $this->assertApiResponse($drivers);
    }

    /**
     * @test
     */
    public function testReaddrivers()
    {
        $drivers = $this->makedrivers();
        $this->json('GET', '/api/v1/drivers/'.$drivers->id);

        $this->assertApiResponse($drivers->toArray());
    }

    /**
     * @test
     */
    public function testUpdatedrivers()
    {
        $drivers = $this->makedrivers();
        $editeddrivers = $this->fakedriversData();

        $this->json('PUT', '/api/v1/drivers/'.$drivers->id, $editeddrivers);

        $this->assertApiResponse($editeddrivers);
    }

    /**
     * @test
     */
    public function testDeletedrivers()
    {
        $drivers = $this->makedrivers();
        $this->json('DELETE', '/api/v1/drivers/'.$drivers->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/drivers/'.$drivers->id);

        $this->assertResponseStatus(404);
    }
}
