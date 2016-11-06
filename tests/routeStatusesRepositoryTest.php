<?php

use App\Models\routeStatuses;
use App\Repositories\routeStatusesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class routeStatusesRepositoryTest extends TestCase
{
    use MakerouteStatusesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var routeStatusesRepository
     */
    protected $routeStatusesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->routeStatusesRepo = App::make(routeStatusesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreaterouteStatuses()
    {
        $routeStatuses = $this->fakerouteStatusesData();
        $createdrouteStatuses = $this->routeStatusesRepo->create($routeStatuses);
        $createdrouteStatuses = $createdrouteStatuses->toArray();
        $this->assertArrayHasKey('id', $createdrouteStatuses);
        $this->assertNotNull($createdrouteStatuses['id'], 'Created routeStatuses must have id specified');
        $this->assertNotNull(routeStatuses::find($createdrouteStatuses['id']), 'routeStatuses with given id must be in DB');
        $this->assertModelData($routeStatuses, $createdrouteStatuses);
    }

    /**
     * @test read
     */
    public function testReadrouteStatuses()
    {
        $routeStatuses = $this->makerouteStatuses();
        $dbrouteStatuses = $this->routeStatusesRepo->find($routeStatuses->id);
        $dbrouteStatuses = $dbrouteStatuses->toArray();
        $this->assertModelData($routeStatuses->toArray(), $dbrouteStatuses);
    }

    /**
     * @test update
     */
    public function testUpdaterouteStatuses()
    {
        $routeStatuses = $this->makerouteStatuses();
        $fakerouteStatuses = $this->fakerouteStatusesData();
        $updatedrouteStatuses = $this->routeStatusesRepo->update($fakerouteStatuses, $routeStatuses->id);
        $this->assertModelData($fakerouteStatuses, $updatedrouteStatuses->toArray());
        $dbrouteStatuses = $this->routeStatusesRepo->find($routeStatuses->id);
        $this->assertModelData($fakerouteStatuses, $dbrouteStatuses->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleterouteStatuses()
    {
        $routeStatuses = $this->makerouteStatuses();
        $resp = $this->routeStatusesRepo->delete($routeStatuses->id);
        $this->assertTrue($resp);
        $this->assertNull(routeStatuses::find($routeStatuses->id), 'routeStatuses should not exist in DB');
    }
}
