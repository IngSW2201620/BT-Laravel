<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class roadsApiTest extends TestCase
{
    use MakeroadsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateroads()
    {
        $roads = $this->fakeroadsData();
        $this->json('POST', '/api/v1/roads', $roads);

        $this->assertApiResponse($roads);
    }

    /**
     * @test
     */
    public function testReadroads()
    {
        $roads = $this->makeroads();
        $this->json('GET', '/api/v1/roads/'.$roads->id);

        $this->assertApiResponse($roads->toArray());
    }

    /**
     * @test
     */
    public function testUpdateroads()
    {
        $roads = $this->makeroads();
        $editedroads = $this->fakeroadsData();

        $this->json('PUT', '/api/v1/roads/'.$roads->id, $editedroads);

        $this->assertApiResponse($editedroads);
    }

    /**
     * @test
     */
    public function testDeleteroads()
    {
        $roads = $this->makeroads();
        $this->json('DELETE', '/api/v1/roads/'.$roads->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/roads/'.$roads->id);

        $this->assertResponseStatus(404);
    }
}
