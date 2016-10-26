<?php

use App\Models\stop;
use App\Repositories\stopRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class stopRepositoryTest extends TestCase
{
    use MakestopTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var stopRepository
     */
    protected $stopRepo;

    public function setUp()
    {
        parent::setUp();
        $this->stopRepo = App::make(stopRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatestop()
    {
        $stop = $this->fakestopData();
        $createdstop = $this->stopRepo->create($stop);
        $createdstop = $createdstop->toArray();
        $this->assertArrayHasKey('id', $createdstop);
        $this->assertNotNull($createdstop['id'], 'Created stop must have id specified');
        $this->assertNotNull(stop::find($createdstop['id']), 'stop with given id must be in DB');
        $this->assertModelData($stop, $createdstop);
    }

    /**
     * @test read
     */
    public function testReadstop()
    {
        $stop = $this->makestop();
        $dbstop = $this->stopRepo->find($stop->id);
        $dbstop = $dbstop->toArray();
        $this->assertModelData($stop->toArray(), $dbstop);
    }

    /**
     * @test update
     */
    public function testUpdatestop()
    {
        $stop = $this->makestop();
        $fakestop = $this->fakestopData();
        $updatedstop = $this->stopRepo->update($fakestop, $stop->id);
        $this->assertModelData($fakestop, $updatedstop->toArray());
        $dbstop = $this->stopRepo->find($stop->id);
        $this->assertModelData($fakestop, $dbstop->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletestop()
    {
        $stop = $this->makestop();
        $resp = $this->stopRepo->delete($stop->id);
        $this->assertTrue($resp);
        $this->assertNull(stop::find($stop->id), 'stop should not exist in DB');
    }
}
