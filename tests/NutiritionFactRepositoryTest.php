<?php

use App\Models\NutiritionFact;
use App\Repositories\NutiritionFactRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NutiritionFactRepositoryTest extends TestCase
{
    use MakeNutiritionFactTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var NutiritionFactRepository
     */
    protected $nutiritionFactRepo;

    public function setUp()
    {
        parent::setUp();
        $this->nutiritionFactRepo = App::make(NutiritionFactRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateNutiritionFact()
    {
        $nutiritionFact = $this->fakeNutiritionFactData();
        $createdNutiritionFact = $this->nutiritionFactRepo->create($nutiritionFact);
        $createdNutiritionFact = $createdNutiritionFact->toArray();
        $this->assertArrayHasKey('id', $createdNutiritionFact);
        $this->assertNotNull($createdNutiritionFact['id'], 'Created NutiritionFact must have id specified');
        $this->assertNotNull(NutiritionFact::find($createdNutiritionFact['id']), 'NutiritionFact with given id must be in DB');
        $this->assertModelData($nutiritionFact, $createdNutiritionFact);
    }

    /**
     * @test read
     */
    public function testReadNutiritionFact()
    {
        $nutiritionFact = $this->makeNutiritionFact();
        $dbNutiritionFact = $this->nutiritionFactRepo->find($nutiritionFact->id);
        $dbNutiritionFact = $dbNutiritionFact->toArray();
        $this->assertModelData($nutiritionFact->toArray(), $dbNutiritionFact);
    }

    /**
     * @test update
     */
    public function testUpdateNutiritionFact()
    {
        $nutiritionFact = $this->makeNutiritionFact();
        $fakeNutiritionFact = $this->fakeNutiritionFactData();
        $updatedNutiritionFact = $this->nutiritionFactRepo->update($fakeNutiritionFact, $nutiritionFact->id);
        $this->assertModelData($fakeNutiritionFact, $updatedNutiritionFact->toArray());
        $dbNutiritionFact = $this->nutiritionFactRepo->find($nutiritionFact->id);
        $this->assertModelData($fakeNutiritionFact, $dbNutiritionFact->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteNutiritionFact()
    {
        $nutiritionFact = $this->makeNutiritionFact();
        $resp = $this->nutiritionFactRepo->delete($nutiritionFact->id);
        $this->assertTrue($resp);
        $this->assertNull(NutiritionFact::find($nutiritionFact->id), 'NutiritionFact should not exist in DB');
    }
}
