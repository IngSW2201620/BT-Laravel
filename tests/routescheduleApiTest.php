<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class routescheduleApiTest extends TestCase
{
    use MakeroutescheduleTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreaterouteschedule()
    {
        $routeschedule = $this->fakeroutescheduleData();
        $this->json('POST', '/api/v1/routeschedules', $routeschedule);

        $this->assertApiResponse($routeschedule);
    }

    /**
     * @test
     */
    public function testReadrouteschedule()
    {
        $routeschedule = $this->makerouteschedule();
        $this->json('GET', '/api/v1/routeschedules/'.$routeschedule->id);

        $this->assertApiResponse($routeschedule->toArray());
    }

    /**
     * @test
     */
    public function testUpdaterouteschedule()
    {
        $routeschedule = $this->makerouteschedule();
        $editedrouteschedule = $this->fakeroutescheduleData();

        $this->json('PUT', '/api/v1/routeschedules/'.$routeschedule->id, $editedrouteschedule);

        $this->assertApiResponse($editedrouteschedule);
    }

    /**
     * @test
     */
    public function testDeleterouteschedule()
    {
        $routeschedule = $this->makerouteschedule();
        $this->json('DELETE', '/api/v1/routeschedules/'.$routeschedule->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/routeschedules/'.$routeschedule->id);

        $this->assertResponseStatus(404);
    }
}
