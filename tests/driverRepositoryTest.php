<?php

use App\Models\driver;
use App\Repositories\driverRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class driverRepositoryTest extends TestCase
{
    use MakedriverTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var driverRepository
     */
    protected $driverRepo;

    public function setUp()
    {
        parent::setUp();
        $this->driverRepo = App::make(driverRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatedriver()
    {
        $driver = $this->fakedriverData();
        $createddriver = $this->driverRepo->create($driver);
        $createddriver = $createddriver->toArray();
        $this->assertArrayHasKey('id', $createddriver);
        $this->assertNotNull($createddriver['id'], 'Created driver must have id specified');
        $this->assertNotNull(driver::find($createddriver['id']), 'driver with given id must be in DB');
        $this->assertModelData($driver, $createddriver);
    }

    /**
     * @test read
     */
    public function testReaddriver()
    {
        $driver = $this->makedriver();
        $dbdriver = $this->driverRepo->find($driver->id);
        $dbdriver = $dbdriver->toArray();
        $this->assertModelData($driver->toArray(), $dbdriver);
    }

    /**
     * @test update
     */
    public function testUpdatedriver()
    {
        $driver = $this->makedriver();
        $fakedriver = $this->fakedriverData();
        $updateddriver = $this->driverRepo->update($fakedriver, $driver->id);
        $this->assertModelData($fakedriver, $updateddriver->toArray());
        $dbdriver = $this->driverRepo->find($driver->id);
        $this->assertModelData($fakedriver, $dbdriver->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletedriver()
    {
        $driver = $this->makedriver();
        $resp = $this->driverRepo->delete($driver->id);
        $this->assertTrue($resp);
        $this->assertNull(driver::find($driver->id), 'driver should not exist in DB');
    }
}
