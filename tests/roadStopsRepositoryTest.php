<?php

use App\Models\roadStops;
use App\Repositories\roadStopsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class roadStopsRepositoryTest extends TestCase
{
    use MakeroadStopsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var roadStopsRepository
     */
    protected $roadStopsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->roadStopsRepo = App::make(roadStopsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateroadStops()
    {
        $roadStops = $this->fakeroadStopsData();
        $createdroadStops = $this->roadStopsRepo->create($roadStops);
        $createdroadStops = $createdroadStops->toArray();
        $this->assertArrayHasKey('id', $createdroadStops);
        $this->assertNotNull($createdroadStops['id'], 'Created roadStops must have id specified');
        $this->assertNotNull(roadStops::find($createdroadStops['id']), 'roadStops with given id must be in DB');
        $this->assertModelData($roadStops, $createdroadStops);
    }

    /**
     * @test read
     */
    public function testReadroadStops()
    {
        $roadStops = $this->makeroadStops();
        $dbroadStops = $this->roadStopsRepo->find($roadStops->id);
        $dbroadStops = $dbroadStops->toArray();
        $this->assertModelData($roadStops->toArray(), $dbroadStops);
    }

    /**
     * @test update
     */
    public function testUpdateroadStops()
    {
        $roadStops = $this->makeroadStops();
        $fakeroadStops = $this->fakeroadStopsData();
        $updatedroadStops = $this->roadStopsRepo->update($fakeroadStops, $roadStops->id);
        $this->assertModelData($fakeroadStops, $updatedroadStops->toArray());
        $dbroadStops = $this->roadStopsRepo->find($roadStops->id);
        $this->assertModelData($fakeroadStops, $dbroadStops->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteroadStops()
    {
        $roadStops = $this->makeroadStops();
        $resp = $this->roadStopsRepo->delete($roadStops->id);
        $this->assertTrue($resp);
        $this->assertNull(roadStops::find($roadStops->id), 'roadStops should not exist in DB');
    }
}
