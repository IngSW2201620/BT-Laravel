<?php

use App\Models\bus;
use App\Repositories\busRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class busRepositoryTest extends TestCase
{
    use MakebusTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var busRepository
     */
    protected $busRepo;

    public function setUp()
    {
        parent::setUp();
        $this->busRepo = App::make(busRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatebus()
    {
        $bus = $this->fakebusData();
        $createdbus = $this->busRepo->create($bus);
        $createdbus = $createdbus->toArray();
        $this->assertArrayHasKey('id', $createdbus);
        $this->assertNotNull($createdbus['id'], 'Created bus must have id specified');
        $this->assertNotNull(bus::find($createdbus['id']), 'bus with given id must be in DB');
        $this->assertModelData($bus, $createdbus);
    }

    /**
     * @test read
     */
    public function testReadbus()
    {
        $bus = $this->makebus();
        $dbbus = $this->busRepo->find($bus->id);
        $dbbus = $dbbus->toArray();
        $this->assertModelData($bus->toArray(), $dbbus);
    }

    /**
     * @test update
     */
    public function testUpdatebus()
    {
        $bus = $this->makebus();
        $fakebus = $this->fakebusData();
        $updatedbus = $this->busRepo->update($fakebus, $bus->id);
        $this->assertModelData($fakebus, $updatedbus->toArray());
        $dbbus = $this->busRepo->find($bus->id);
        $this->assertModelData($fakebus, $dbbus->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletebus()
    {
        $bus = $this->makebus();
        $resp = $this->busRepo->delete($bus->id);
        $this->assertTrue($resp);
        $this->assertNull(bus::find($bus->id), 'bus should not exist in DB');
    }
}
