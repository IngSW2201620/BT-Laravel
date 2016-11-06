<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class stopsApiTest extends TestCase
{
    use MakestopsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatestops()
    {
        $stops = $this->fakestopsData();
        $this->json('POST', '/api/v1/stops', $stops);

        $this->assertApiResponse($stops);
    }

    /**
     * @test
     */
    public function testReadstops()
    {
        $stops = $this->makestops();
        $this->json('GET', '/api/v1/stops/'.$stops->id);

        $this->assertApiResponse($stops->toArray());
    }

    /**
     * @test
     */
    public function testUpdatestops()
    {
        $stops = $this->makestops();
        $editedstops = $this->fakestopsData();

        $this->json('PUT', '/api/v1/stops/'.$stops->id, $editedstops);

        $this->assertApiResponse($editedstops);
    }

    /**
     * @test
     */
    public function testDeletestops()
    {
        $stops = $this->makestops();
        $this->json('DELETE', '/api/v1/stops/'.$stops->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/stops/'.$stops->id);

        $this->assertResponseStatus(404);
    }
}
