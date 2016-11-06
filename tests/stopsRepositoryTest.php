<?php

use App\Models\stops;
use App\Repositories\stopsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class stopsRepositoryTest extends TestCase
{
    use MakestopsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var stopsRepository
     */
    protected $stopsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->stopsRepo = App::make(stopsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatestops()
    {
        $stops = $this->fakestopsData();
        $createdstops = $this->stopsRepo->create($stops);
        $createdstops = $createdstops->toArray();
        $this->assertArrayHasKey('id', $createdstops);
        $this->assertNotNull($createdstops['id'], 'Created stops must have id specified');
        $this->assertNotNull(stops::find($createdstops['id']), 'stops with given id must be in DB');
        $this->assertModelData($stops, $createdstops);
    }

    /**
     * @test read
     */
    public function testReadstops()
    {
        $stops = $this->makestops();
        $dbstops = $this->stopsRepo->find($stops->id);
        $dbstops = $dbstops->toArray();
        $this->assertModelData($stops->toArray(), $dbstops);
    }

    /**
     * @test update
     */
    public function testUpdatestops()
    {
        $stops = $this->makestops();
        $fakestops = $this->fakestopsData();
        $updatedstops = $this->stopsRepo->update($fakestops, $stops->id);
        $this->assertModelData($fakestops, $updatedstops->toArray());
        $dbstops = $this->stopsRepo->find($stops->id);
        $this->assertModelData($fakestops, $dbstops->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletestops()
    {
        $stops = $this->makestops();
        $resp = $this->stopsRepo->delete($stops->id);
        $this->assertTrue($resp);
        $this->assertNull(stops::find($stops->id), 'stops should not exist in DB');
    }
}
