<?php

use App\Models\route_statuses;
use App\Repositories\route_statusesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class route_statusesRepositoryTest extends TestCase
{
    use Makeroute_statusesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var route_statusesRepository
     */
    protected $routeStatusesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->routeStatusesRepo = App::make(route_statusesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateroute_statuses()
    {
        $routeStatuses = $this->fakeroute_statusesData();
        $createdroute_statuses = $this->routeStatusesRepo->create($routeStatuses);
        $createdroute_statuses = $createdroute_statuses->toArray();
        $this->assertArrayHasKey('id', $createdroute_statuses);
        $this->assertNotNull($createdroute_statuses['id'], 'Created route_statuses must have id specified');
        $this->assertNotNull(route_statuses::find($createdroute_statuses['id']), 'route_statuses with given id must be in DB');
        $this->assertModelData($routeStatuses, $createdroute_statuses);
    }

    /**
     * @test read
     */
    public function testReadroute_statuses()
    {
        $routeStatuses = $this->makeroute_statuses();
        $dbroute_statuses = $this->routeStatusesRepo->find($routeStatuses->id);
        $dbroute_statuses = $dbroute_statuses->toArray();
        $this->assertModelData($routeStatuses->toArray(), $dbroute_statuses);
    }

    /**
     * @test update
     */
    public function testUpdateroute_statuses()
    {
        $routeStatuses = $this->makeroute_statuses();
        $fakeroute_statuses = $this->fakeroute_statusesData();
        $updatedroute_statuses = $this->routeStatusesRepo->update($fakeroute_statuses, $routeStatuses->id);
        $this->assertModelData($fakeroute_statuses, $updatedroute_statuses->toArray());
        $dbroute_statuses = $this->routeStatusesRepo->find($routeStatuses->id);
        $this->assertModelData($fakeroute_statuses, $dbroute_statuses->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteroute_statuses()
    {
        $routeStatuses = $this->makeroute_statuses();
        $resp = $this->routeStatusesRepo->delete($routeStatuses->id);
        $this->assertTrue($resp);
        $this->assertNull(route_statuses::find($routeStatuses->id), 'route_statuses should not exist in DB');
    }
}
