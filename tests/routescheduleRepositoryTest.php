<?php

use App\Models\routeschedule;
use App\Repositories\routescheduleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class routescheduleRepositoryTest extends TestCase
{
    use MakeroutescheduleTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var routescheduleRepository
     */
    protected $routescheduleRepo;

    public function setUp()
    {
        parent::setUp();
        $this->routescheduleRepo = App::make(routescheduleRepository::class);
    }

    /**
     * @test create
     */
    public function testCreaterouteschedule()
    {
        $routeschedule = $this->fakeroutescheduleData();
        $createdrouteschedule = $this->routescheduleRepo->create($routeschedule);
        $createdrouteschedule = $createdrouteschedule->toArray();
        $this->assertArrayHasKey('id', $createdrouteschedule);
        $this->assertNotNull($createdrouteschedule['id'], 'Created routeschedule must have id specified');
        $this->assertNotNull(routeschedule::find($createdrouteschedule['id']), 'routeschedule with given id must be in DB');
        $this->assertModelData($routeschedule, $createdrouteschedule);
    }

    /**
     * @test read
     */
    public function testReadrouteschedule()
    {
        $routeschedule = $this->makerouteschedule();
        $dbrouteschedule = $this->routescheduleRepo->find($routeschedule->id);
        $dbrouteschedule = $dbrouteschedule->toArray();
        $this->assertModelData($routeschedule->toArray(), $dbrouteschedule);
    }

    /**
     * @test update
     */
    public function testUpdaterouteschedule()
    {
        $routeschedule = $this->makerouteschedule();
        $fakerouteschedule = $this->fakeroutescheduleData();
        $updatedrouteschedule = $this->routescheduleRepo->update($fakerouteschedule, $routeschedule->id);
        $this->assertModelData($fakerouteschedule, $updatedrouteschedule->toArray());
        $dbrouteschedule = $this->routescheduleRepo->find($routeschedule->id);
        $this->assertModelData($fakerouteschedule, $dbrouteschedule->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleterouteschedule()
    {
        $routeschedule = $this->makerouteschedule();
        $resp = $this->routescheduleRepo->delete($routeschedule->id);
        $this->assertTrue($resp);
        $this->assertNull(routeschedule::find($routeschedule->id), 'routeschedule should not exist in DB');
    }
}
