<?php

use App\Models\tickets;
use App\Repositories\ticketsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ticketsRepositoryTest extends TestCase
{
    use MaketicketsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ticketsRepository
     */
    protected $ticketsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->ticketsRepo = App::make(ticketsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatetickets()
    {
        $tickets = $this->faketicketsData();
        $createdtickets = $this->ticketsRepo->create($tickets);
        $createdtickets = $createdtickets->toArray();
        $this->assertArrayHasKey('id', $createdtickets);
        $this->assertNotNull($createdtickets['id'], 'Created tickets must have id specified');
        $this->assertNotNull(tickets::find($createdtickets['id']), 'tickets with given id must be in DB');
        $this->assertModelData($tickets, $createdtickets);
    }

    /**
     * @test read
     */
    public function testReadtickets()
    {
        $tickets = $this->maketickets();
        $dbtickets = $this->ticketsRepo->find($tickets->id);
        $dbtickets = $dbtickets->toArray();
        $this->assertModelData($tickets->toArray(), $dbtickets);
    }

    /**
     * @test update
     */
    public function testUpdatetickets()
    {
        $tickets = $this->maketickets();
        $faketickets = $this->faketicketsData();
        $updatedtickets = $this->ticketsRepo->update($faketickets, $tickets->id);
        $this->assertModelData($faketickets, $updatedtickets->toArray());
        $dbtickets = $this->ticketsRepo->find($tickets->id);
        $this->assertModelData($faketickets, $dbtickets->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletetickets()
    {
        $tickets = $this->maketickets();
        $resp = $this->ticketsRepo->delete($tickets->id);
        $this->assertTrue($resp);
        $this->assertNull(tickets::find($tickets->id), 'tickets should not exist in DB');
    }
}
