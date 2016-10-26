<?php

use App\Models\road;
use App\Repositories\roadRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class roadRepositoryTest extends TestCase
{
    use MakeroadTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var roadRepository
     */
    protected $roadRepo;

    public function setUp()
    {
        parent::setUp();
        $this->roadRepo = App::make(roadRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateroad()
    {
        $road = $this->fakeroadData();
        $createdroad = $this->roadRepo->create($road);
        $createdroad = $createdroad->toArray();
        $this->assertArrayHasKey('id', $createdroad);
        $this->assertNotNull($createdroad['id'], 'Created road must have id specified');
        $this->assertNotNull(road::find($createdroad['id']), 'road with given id must be in DB');
        $this->assertModelData($road, $createdroad);
    }

    /**
     * @test read
     */
    public function testReadroad()
    {
        $road = $this->makeroad();
        $dbroad = $this->roadRepo->find($road->id);
        $dbroad = $dbroad->toArray();
        $this->assertModelData($road->toArray(), $dbroad);
    }

    /**
     * @test update
     */
    public function testUpdateroad()
    {
        $road = $this->makeroad();
        $fakeroad = $this->fakeroadData();
        $updatedroad = $this->roadRepo->update($fakeroad, $road->id);
        $this->assertModelData($fakeroad, $updatedroad->toArray());
        $dbroad = $this->roadRepo->find($road->id);
        $this->assertModelData($fakeroad, $dbroad->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteroad()
    {
        $road = $this->makeroad();
        $resp = $this->roadRepo->delete($road->id);
        $this->assertTrue($resp);
        $this->assertNull(road::find($road->id), 'road should not exist in DB');
    }
}
