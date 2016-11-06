<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ticketsApiTest extends TestCase
{
    use MaketicketsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatetickets()
    {
        $tickets = $this->faketicketsData();
        $this->json('POST', '/api/v1/tickets', $tickets);

        $this->assertApiResponse($tickets);
    }

    /**
     * @test
     */
    public function testReadtickets()
    {
        $tickets = $this->maketickets();
        $this->json('GET', '/api/v1/tickets/'.$tickets->id);

        $this->assertApiResponse($tickets->toArray());
    }

    /**
     * @test
     */
    public function testUpdatetickets()
    {
        $tickets = $this->maketickets();
        $editedtickets = $this->faketicketsData();

        $this->json('PUT', '/api/v1/tickets/'.$tickets->id, $editedtickets);

        $this->assertApiResponse($editedtickets);
    }

    /**
     * @test
     */
    public function testDeletetickets()
    {
        $tickets = $this->maketickets();
        $this->json('DELETE', '/api/v1/tickets/'.$tickets->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tickets/'.$tickets->id);

        $this->assertResponseStatus(404);
    }
}
