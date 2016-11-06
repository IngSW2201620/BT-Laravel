<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class route_statusesApiTest extends TestCase
{
    use Makeroute_statusesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateroute_statuses()
    {
        $routeStatuses = $this->fakeroute_statusesData();
        $this->json('POST', '/api/v1/routeStatuses', $routeStatuses);

        $this->assertApiResponse($routeStatuses);
    }

    /**
     * @test
     */
    public function testReadroute_statuses()
    {
        $routeStatuses = $this->makeroute_statuses();
        $this->json('GET', '/api/v1/routeStatuses/'.$routeStatuses->id);

        $this->assertApiResponse($routeStatuses->toArray());
    }

    /**
     * @test
     */
    public function testUpdateroute_statuses()
    {
        $routeStatuses = $this->makeroute_statuses();
        $editedroute_statuses = $this->fakeroute_statusesData();

        $this->json('PUT', '/api/v1/routeStatuses/'.$routeStatuses->id, $editedroute_statuses);

        $this->assertApiResponse($editedroute_statuses);
    }

    /**
     * @test
     */
    public function testDeleteroute_statuses()
    {
        $routeStatuses = $this->makeroute_statuses();
        $this->json('DELETE', '/api/v1/routeStatuses/'.$routeStatuses->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/routeStatuses/'.$routeStatuses->id);

        $this->assertResponseStatus(404);
    }
}
