<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class busPositionsApiTest extends TestCase
{
    use MakebusPositionsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatebusPositions()
    {
        $busPositions = $this->fakebusPositionsData();
        $this->json('POST', '/api/v1/busPositions', $busPositions);

        $this->assertApiResponse($busPositions);
    }

    /**
     * @test
     */
    public function testReadbusPositions()
    {
        $busPositions = $this->makebusPositions();
        $this->json('GET', '/api/v1/busPositions/'.$busPositions->id);

        $this->assertApiResponse($busPositions->toArray());
    }

    /**
     * @test
     */
    public function testUpdatebusPositions()
    {
        $busPositions = $this->makebusPositions();
        $editedbusPositions = $this->fakebusPositionsData();

        $this->json('PUT', '/api/v1/busPositions/'.$busPositions->id, $editedbusPositions);

        $this->assertApiResponse($editedbusPositions);
    }

    /**
     * @test
     */
    public function testDeletebusPositions()
    {
        $busPositions = $this->makebusPositions();
        $this->json('DELETE', '/api/v1/busPositions/'.$busPositions->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/busPositions/'.$busPositions->id);

        $this->assertResponseStatus(404);
    }
}
