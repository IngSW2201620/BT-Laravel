<?php

use App\Models\drivers;
use App\Repositories\driversRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class driversRepositoryTest extends TestCase
{
    use MakedriversTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var driversRepository
     */
    protected $driversRepo;

    public function setUp()
    {
        parent::setUp();
        $this->driversRepo = App::make(driversRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatedrivers()
    {
        $drivers = $this->fakedriversData();
        $createddrivers = $this->driversRepo->create($drivers);
        $createddrivers = $createddrivers->toArray();
        $this->assertArrayHasKey('id', $createddrivers);
        $this->assertNotNull($createddrivers['id'], 'Created drivers must have id specified');
        $this->assertNotNull(drivers::find($createddrivers['id']), 'drivers with given id must be in DB');
        $this->assertModelData($drivers, $createddrivers);
    }

    /**
     * @test read
     */
    public function testReaddrivers()
    {
        $drivers = $this->makedrivers();
        $dbdrivers = $this->driversRepo->find($drivers->id);
        $dbdrivers = $dbdrivers->toArray();
        $this->assertModelData($drivers->toArray(), $dbdrivers);
    }

    /**
     * @test update
     */
    public function testUpdatedrivers()
    {
        $drivers = $this->makedrivers();
        $fakedrivers = $this->fakedriversData();
        $updateddrivers = $this->driversRepo->update($fakedrivers, $drivers->id);
        $this->assertModelData($fakedrivers, $updateddrivers->toArray());
        $dbdrivers = $this->driversRepo->find($drivers->id);
        $this->assertModelData($fakedrivers, $dbdrivers->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletedrivers()
    {
        $drivers = $this->makedrivers();
        $resp = $this->driversRepo->delete($drivers->id);
        $this->assertTrue($resp);
        $this->assertNull(drivers::find($drivers->id), 'drivers should not exist in DB');
    }
}
