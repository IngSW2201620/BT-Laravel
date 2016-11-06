<?php

use App\Models\roads;
use App\Repositories\roadsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class roadsRepositoryTest extends TestCase
{
    use MakeroadsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var roadsRepository
     */
    protected $roadsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->roadsRepo = App::make(roadsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateroads()
    {
        $roads = $this->fakeroadsData();
        $createdroads = $this->roadsRepo->create($roads);
        $createdroads = $createdroads->toArray();
        $this->assertArrayHasKey('id', $createdroads);
        $this->assertNotNull($createdroads['id'], 'Created roads must have id specified');
        $this->assertNotNull(roads::find($createdroads['id']), 'roads with given id must be in DB');
        $this->assertModelData($roads, $createdroads);
    }

    /**
     * @test read
     */
    public function testReadroads()
    {
        $roads = $this->makeroads();
        $dbroads = $this->roadsRepo->find($roads->id);
        $dbroads = $dbroads->toArray();
        $this->assertModelData($roads->toArray(), $dbroads);
    }

    /**
     * @test update
     */
    public function testUpdateroads()
    {
        $roads = $this->makeroads();
        $fakeroads = $this->fakeroadsData();
        $updatedroads = $this->roadsRepo->update($fakeroads, $roads->id);
        $this->assertModelData($fakeroads, $updatedroads->toArray());
        $dbroads = $this->roadsRepo->find($roads->id);
        $this->assertModelData($fakeroads, $dbroads->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteroads()
    {
        $roads = $this->makeroads();
        $resp = $this->roadsRepo->delete($roads->id);
        $this->assertTrue($resp);
        $this->assertNull(roads::find($roads->id), 'roads should not exist in DB');
    }
}
