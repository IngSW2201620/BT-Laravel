<?php

use App\Models\routes;
use App\Repositories\routesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class routesRepositoryTest extends TestCase
{
    use MakeroutesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var routesRepository
     */
    protected $routesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->routesRepo = App::make(routesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateroutes()
    {
        $routes = $this->fakeroutesData();
        $createdroutes = $this->routesRepo->create($routes);
        $createdroutes = $createdroutes->toArray();
        $this->assertArrayHasKey('id', $createdroutes);
        $this->assertNotNull($createdroutes['id'], 'Created routes must have id specified');
        $this->assertNotNull(routes::find($createdroutes['id']), 'routes with given id must be in DB');
        $this->assertModelData($routes, $createdroutes);
    }

    /**
     * @test read
     */
    public function testReadroutes()
    {
        $routes = $this->makeroutes();
        $dbroutes = $this->routesRepo->find($routes->id);
        $dbroutes = $dbroutes->toArray();
        $this->assertModelData($routes->toArray(), $dbroutes);
    }

    /**
     * @test update
     */
    public function testUpdateroutes()
    {
        $routes = $this->makeroutes();
        $fakeroutes = $this->fakeroutesData();
        $updatedroutes = $this->routesRepo->update($fakeroutes, $routes->id);
        $this->assertModelData($fakeroutes, $updatedroutes->toArray());
        $dbroutes = $this->routesRepo->find($routes->id);
        $this->assertModelData($fakeroutes, $dbroutes->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteroutes()
    {
        $routes = $this->makeroutes();
        $resp = $this->routesRepo->delete($routes->id);
        $this->assertTrue($resp);
        $this->assertNull(routes::find($routes->id), 'routes should not exist in DB');
    }
}
