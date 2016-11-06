<?php

use App\Models\busPositions;
use App\Repositories\busPositionsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class busPositionsRepositoryTest extends TestCase
{
    use MakebusPositionsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var busPositionsRepository
     */
    protected $busPositionsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->busPositionsRepo = App::make(busPositionsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatebusPositions()
    {
        $busPositions = $this->fakebusPositionsData();
        $createdbusPositions = $this->busPositionsRepo->create($busPositions);
        $createdbusPositions = $createdbusPositions->toArray();
        $this->assertArrayHasKey('id', $createdbusPositions);
        $this->assertNotNull($createdbusPositions['id'], 'Created busPositions must have id specified');
        $this->assertNotNull(busPositions::find($createdbusPositions['id']), 'busPositions with given id must be in DB');
        $this->assertModelData($busPositions, $createdbusPositions);
    }

    /**
     * @test read
     */
    public function testReadbusPositions()
    {
        $busPositions = $this->makebusPositions();
        $dbbusPositions = $this->busPositionsRepo->find($busPositions->id);
        $dbbusPositions = $dbbusPositions->toArray();
        $this->assertModelData($busPositions->toArray(), $dbbusPositions);
    }

    /**
     * @test update
     */
    public function testUpdatebusPositions()
    {
        $busPositions = $this->makebusPositions();
        $fakebusPositions = $this->fakebusPositionsData();
        $updatedbusPositions = $this->busPositionsRepo->update($fakebusPositions, $busPositions->id);
        $this->assertModelData($fakebusPositions, $updatedbusPositions->toArray());
        $dbbusPositions = $this->busPositionsRepo->find($busPositions->id);
        $this->assertModelData($fakebusPositions, $dbbusPositions->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletebusPositions()
    {
        $busPositions = $this->makebusPositions();
        $resp = $this->busPositionsRepo->delete($busPositions->id);
        $this->assertTrue($resp);
        $this->assertNull(busPositions::find($busPositions->id), 'busPositions should not exist in DB');
    }
}
