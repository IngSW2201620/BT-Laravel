<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class sellersApiTest extends TestCase
{
    use MakesellersTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesellers()
    {
        $sellers = $this->fakesellersData();
        $this->json('POST', '/api/v1/sellers', $sellers);

        $this->assertApiResponse($sellers);
    }

    /**
     * @test
     */
    public function testReadsellers()
    {
        $sellers = $this->makesellers();
        $this->json('GET', '/api/v1/sellers/'.$sellers->id);

        $this->assertApiResponse($sellers->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesellers()
    {
        $sellers = $this->makesellers();
        $editedsellers = $this->fakesellersData();

        $this->json('PUT', '/api/v1/sellers/'.$sellers->id, $editedsellers);

        $this->assertApiResponse($editedsellers);
    }

    /**
     * @test
     */
    public function testDeletesellers()
    {
        $sellers = $this->makesellers();
        $this->json('DELETE', '/api/v1/sellers/'.$sellers->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/sellers/'.$sellers->id);

        $this->assertResponseStatus(404);
    }
}
