<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class roadApiTest extends TestCase
{
    use MakeroadTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateroad()
    {
        $road = $this->fakeroadData();
        $this->json('POST', '/api/v1/roads', $road);

        $this->assertApiResponse($road);
    }

    /**
     * @test
     */
    public function testReadroad()
    {
        $road = $this->makeroad();
        $this->json('GET', '/api/v1/roads/'.$road->id);

        $this->assertApiResponse($road->toArray());
    }

    /**
     * @test
     */
    public function testUpdateroad()
    {
        $road = $this->makeroad();
        $editedroad = $this->fakeroadData();

        $this->json('PUT', '/api/v1/roads/'.$road->id, $editedroad);

        $this->assertApiResponse($editedroad);
    }

    /**
     * @test
     */
    public function testDeleteroad()
    {
        $road = $this->makeroad();
        $this->json('DELETE', '/api/v1/roads/'.$road->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/roads/'.$road->id);

        $this->assertResponseStatus(404);
    }
}
