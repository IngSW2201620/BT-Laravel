<?php

use App\Models\sellers;
use App\Repositories\sellersRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class sellersRepositoryTest extends TestCase
{
    use MakesellersTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var sellersRepository
     */
    protected $sellersRepo;

    public function setUp()
    {
        parent::setUp();
        $this->sellersRepo = App::make(sellersRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesellers()
    {
        $sellers = $this->fakesellersData();
        $createdsellers = $this->sellersRepo->create($sellers);
        $createdsellers = $createdsellers->toArray();
        $this->assertArrayHasKey('id', $createdsellers);
        $this->assertNotNull($createdsellers['id'], 'Created sellers must have id specified');
        $this->assertNotNull(sellers::find($createdsellers['id']), 'sellers with given id must be in DB');
        $this->assertModelData($sellers, $createdsellers);
    }

    /**
     * @test read
     */
    public function testReadsellers()
    {
        $sellers = $this->makesellers();
        $dbsellers = $this->sellersRepo->find($sellers->id);
        $dbsellers = $dbsellers->toArray();
        $this->assertModelData($sellers->toArray(), $dbsellers);
    }

    /**
     * @test update
     */
    public function testUpdatesellers()
    {
        $sellers = $this->makesellers();
        $fakesellers = $this->fakesellersData();
        $updatedsellers = $this->sellersRepo->update($fakesellers, $sellers->id);
        $this->assertModelData($fakesellers, $updatedsellers->toArray());
        $dbsellers = $this->sellersRepo->find($sellers->id);
        $this->assertModelData($fakesellers, $dbsellers->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesellers()
    {
        $sellers = $this->makesellers();
        $resp = $this->sellersRepo->delete($sellers->id);
        $this->assertTrue($resp);
        $this->assertNull(sellers::find($sellers->id), 'sellers should not exist in DB');
    }
}
