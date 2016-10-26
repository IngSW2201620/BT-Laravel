<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class stopApiTest extends TestCase
{
    use MakestopTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatestop()
    {
        $stop = $this->fakestopData();
        $this->json('POST', '/api/v1/stops', $stop);

        $this->assertApiResponse($stop);
    }

    /**
     * @test
     */
    public function testReadstop()
    {
        $stop = $this->makestop();
        $this->json('GET', '/api/v1/stops/'.$stop->id);

        $this->assertApiResponse($stop->toArray());
    }

    /**
     * @test
     */
    public function testUpdatestop()
    {
        $stop = $this->makestop();
        $editedstop = $this->fakestopData();

        $this->json('PUT', '/api/v1/stops/'.$stop->id, $editedstop);

        $this->assertApiResponse($editedstop);
    }

    /**
     * @test
     */
    public function testDeletestop()
    {
        $stop = $this->makestop();
        $this->json('DELETE', '/api/v1/stops/'.$stop->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/stops/'.$stop->id);

        $this->assertResponseStatus(404);
    }
}
