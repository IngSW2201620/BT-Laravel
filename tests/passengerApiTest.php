<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class passengerApiTest extends TestCase
{
    use MakepassengerTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatepassenger()
    {
        $passenger = $this->fakepassengerData();
        $this->json('POST', '/api/v1/passengers', $passenger);

        $this->assertApiResponse($passenger);
    }

    /**
     * @test
     */
    public function testReadpassenger()
    {
        $passenger = $this->makepassenger();
        $this->json('GET', '/api/v1/passengers/'.$passenger->id);

        $this->assertApiResponse($passenger->toArray());
    }

    /**
     * @test
     */
    public function testUpdatepassenger()
    {
        $passenger = $this->makepassenger();
        $editedpassenger = $this->fakepassengerData();

        $this->json('PUT', '/api/v1/passengers/'.$passenger->id, $editedpassenger);

        $this->assertApiResponse($editedpassenger);
    }

    /**
     * @test
     */
    public function testDeletepassenger()
    {
        $passenger = $this->makepassenger();
        $this->json('DELETE', '/api/v1/passengers/'.$passenger->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/passengers/'.$passenger->id);

        $this->assertResponseStatus(404);
    }
}
