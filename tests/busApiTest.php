<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class busApiTest extends TestCase
{
    use MakebusTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatebus()
    {
        $bus = $this->fakebusData();
        $this->json('POST', '/api/v1/buses', $bus);

        $this->assertApiResponse($bus);
    }

    /**
     * @test
     */
    public function testReadbus()
    {
        $bus = $this->makebus();
        $this->json('GET', '/api/v1/buses/'.$bus->id);

        $this->assertApiResponse($bus->toArray());
    }

    /**
     * @test
     */
    public function testUpdatebus()
    {
        $bus = $this->makebus();
        $editedbus = $this->fakebusData();

        $this->json('PUT', '/api/v1/buses/'.$bus->id, $editedbus);

        $this->assertApiResponse($editedbus);
    }

    /**
     * @test
     */
    public function testDeletebus()
    {
        $bus = $this->makebus();
        $this->json('DELETE', '/api/v1/buses/'.$bus->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/buses/'.$bus->id);

        $this->assertResponseStatus(404);
    }
}
