<?php

use App\Models\buses;
use App\Repositories\busesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class busesRepositoryTest extends TestCase
{
    use MakebusesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var busesRepository
     */
    protected $busesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->busesRepo = App::make(busesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatebuses()
    {
        $buses = $this->fakebusesData();
        $createdbuses = $this->busesRepo->create($buses);
        $createdbuses = $createdbuses->toArray();
        $this->assertArrayHasKey('id', $createdbuses);
        $this->assertNotNull($createdbuses['id'], 'Created buses must have id specified');
        $this->assertNotNull(buses::find($createdbuses['id']), 'buses with given id must be in DB');
        $this->assertModelData($buses, $createdbuses);
    }

    /**
     * @test read
     */
    public function testReadbuses()
    {
        $buses = $this->makebuses();
        $dbbuses = $this->busesRepo->find($buses->id);
        $dbbuses = $dbbuses->toArray();
        $this->assertModelData($buses->toArray(), $dbbuses);
    }

    /**
     * @test update
     */
    public function testUpdatebuses()
    {
        $buses = $this->makebuses();
        $fakebuses = $this->fakebusesData();
        $updatedbuses = $this->busesRepo->update($fakebuses, $buses->id);
        $this->assertModelData($fakebuses, $updatedbuses->toArray());
        $dbbuses = $this->busesRepo->find($buses->id);
        $this->assertModelData($fakebuses, $dbbuses->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletebuses()
    {
        $buses = $this->makebuses();
        $resp = $this->busesRepo->delete($buses->id);
        $this->assertTrue($resp);
        $this->assertNull(buses::find($buses->id), 'buses should not exist in DB');
    }
}
