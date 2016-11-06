<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class roadStopsApiTest extends TestCase
{
    use MakeroadStopsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateroadStops()
    {
        $roadStops = $this->fakeroadStopsData();
        $this->json('POST', '/api/v1/roadStops', $roadStops);

        $this->assertApiResponse($roadStops);
    }

    /**
     * @test
     */
    public function testReadroadStops()
    {
        $roadStops = $this->makeroadStops();
        $this->json('GET', '/api/v1/roadStops/'.$roadStops->id);

        $this->assertApiResponse($roadStops->toArray());
    }

    /**
     * @test
     */
    public function testUpdateroadStops()
    {
        $roadStops = $this->makeroadStops();
        $editedroadStops = $this->fakeroadStopsData();

        $this->json('PUT', '/api/v1/roadStops/'.$roadStops->id, $editedroadStops);

        $this->assertApiResponse($editedroadStops);
    }

    /**
     * @test
     */
    public function testDeleteroadStops()
    {
        $roadStops = $this->makeroadStops();
        $this->json('DELETE', '/api/v1/roadStops/'.$roadStops->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/roadStops/'.$roadStops->id);

        $this->assertResponseStatus(404);
    }
}
