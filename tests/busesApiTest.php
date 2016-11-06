<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class busesApiTest extends TestCase
{
    use MakebusesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatebuses()
    {
        $buses = $this->fakebusesData();
        $this->json('POST', '/api/v1/buses', $buses);

        $this->assertApiResponse($buses);
    }

    /**
     * @test
     */
    public function testReadbuses()
    {
        $buses = $this->makebuses();
        $this->json('GET', '/api/v1/buses/'.$buses->id);

        $this->assertApiResponse($buses->toArray());
    }

    /**
     * @test
     */
    public function testUpdatebuses()
    {
        $buses = $this->makebuses();
        $editedbuses = $this->fakebusesData();

        $this->json('PUT', '/api/v1/buses/'.$buses->id, $editedbuses);

        $this->assertApiResponse($editedbuses);
    }

    /**
     * @test
     */
    public function testDeletebuses()
    {
        $buses = $this->makebuses();
        $this->json('DELETE', '/api/v1/buses/'.$buses->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/buses/'.$buses->id);

        $this->assertResponseStatus(404);
    }
}
