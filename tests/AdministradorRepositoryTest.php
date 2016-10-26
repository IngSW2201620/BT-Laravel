<?php

use App\Models\Administrador;
use App\Repositories\AdministradorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdministradorRepositoryTest extends TestCase
{
    use MakeAdministradorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AdministradorRepository
     */
    protected $administradorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->administradorRepo = App::make(AdministradorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAdministrador()
    {
        $administrador = $this->fakeAdministradorData();
        $createdAdministrador = $this->administradorRepo->create($administrador);
        $createdAdministrador = $createdAdministrador->toArray();
        $this->assertArrayHasKey('id', $createdAdministrador);
        $this->assertNotNull($createdAdministrador['id'], 'Created Administrador must have id specified');
        $this->assertNotNull(Administrador::find($createdAdministrador['id']), 'Administrador with given id must be in DB');
        $this->assertModelData($administrador, $createdAdministrador);
    }

    /**
     * @test read
     */
    public function testReadAdministrador()
    {
        $administrador = $this->makeAdministrador();
        $dbAdministrador = $this->administradorRepo->find($administrador->id);
        $dbAdministrador = $dbAdministrador->toArray();
        $this->assertModelData($administrador->toArray(), $dbAdministrador);
    }

    /**
     * @test update
     */
    public function testUpdateAdministrador()
    {
        $administrador = $this->makeAdministrador();
        $fakeAdministrador = $this->fakeAdministradorData();
        $updatedAdministrador = $this->administradorRepo->update($fakeAdministrador, $administrador->id);
        $this->assertModelData($fakeAdministrador, $updatedAdministrador->toArray());
        $dbAdministrador = $this->administradorRepo->find($administrador->id);
        $this->assertModelData($fakeAdministrador, $dbAdministrador->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAdministrador()
    {
        $administrador = $this->makeAdministrador();
        $resp = $this->administradorRepo->delete($administrador->id);
        $this->assertTrue($resp);
        $this->assertNull(Administrador::find($administrador->id), 'Administrador should not exist in DB');
    }
}
