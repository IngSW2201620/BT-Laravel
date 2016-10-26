<?php

use App\Models\passenger;
use App\Repositories\passengerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class passengerRepositoryTest extends TestCase
{
    use MakepassengerTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var passengerRepository
     */
    protected $passengerRepo;

    public function setUp()
    {
        parent::setUp();
        $this->passengerRepo = App::make(passengerRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatepassenger()
    {
        $passenger = $this->fakepassengerData();
        $createdpassenger = $this->passengerRepo->create($passenger);
        $createdpassenger = $createdpassenger->toArray();
        $this->assertArrayHasKey('id', $createdpassenger);
        $this->assertNotNull($createdpassenger['id'], 'Created passenger must have id specified');
        $this->assertNotNull(passenger::find($createdpassenger['id']), 'passenger with given id must be in DB');
        $this->assertModelData($passenger, $createdpassenger);
    }

    /**
     * @test read
     */
    public function testReadpassenger()
    {
        $passenger = $this->makepassenger();
        $dbpassenger = $this->passengerRepo->find($passenger->id);
        $dbpassenger = $dbpassenger->toArray();
        $this->assertModelData($passenger->toArray(), $dbpassenger);
    }

    /**
     * @test update
     */
    public function testUpdatepassenger()
    {
        $passenger = $this->makepassenger();
        $fakepassenger = $this->fakepassengerData();
        $updatedpassenger = $this->passengerRepo->update($fakepassenger, $passenger->id);
        $this->assertModelData($fakepassenger, $updatedpassenger->toArray());
        $dbpassenger = $this->passengerRepo->find($passenger->id);
        $this->assertModelData($fakepassenger, $dbpassenger->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletepassenger()
    {
        $passenger = $this->makepassenger();
        $resp = $this->passengerRepo->delete($passenger->id);
        $this->assertTrue($resp);
        $this->assertNull(passenger::find($passenger->id), 'passenger should not exist in DB');
    }
}
