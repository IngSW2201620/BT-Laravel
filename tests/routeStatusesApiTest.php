<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class routeStatusesApiTest extends TestCase
{
    use MakerouteStatusesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreaterouteStatuses()
    {
        $routeStatuses = $this->fakerouteStatusesData();
        $this->json('POST', '/api/v1/routeStatuses', $routeStatuses);

        $this->assertApiResponse($routeStatuses);
    }

    /**
     * @test
     */
    public function testReadrouteStatuses()
    {
        $routeStatuses = $this->makerouteStatuses();
        $this->json('GET', '/api/v1/routeStatuses/'.$routeStatuses->id);

        $this->assertApiResponse($routeStatuses->toArray());
    }

    /**
     * @test
     */
    public function testUpdaterouteStatuses()
    {
        $routeStatuses = $this->makerouteStatuses();
        $editedrouteStatuses = $this->fakerouteStatusesData();

        $this->json('PUT', '/api/v1/routeStatuses/'.$routeStatuses->id, $editedrouteStatuses);

        $this->assertApiResponse($editedrouteStatuses);
    }

    /**
     * @test
     */
    public function testDeleterouteStatuses()
    {
        $routeStatuses = $this->makerouteStatuses();
        $this->json('DELETE', '/api/v1/routeStatuses/'.$routeStatuses->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/routeStatuses/'.$routeStatuses->id);

        $this->assertResponseStatus(404);
    }
}
