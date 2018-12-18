<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NutiritionFactApiTest extends TestCase
{
    use MakeNutiritionFactTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateNutiritionFact()
    {
        $nutiritionFact = $this->fakeNutiritionFactData();
        $this->json('POST', '/api/v1/nutiritionFacts', $nutiritionFact);

        $this->assertApiResponse($nutiritionFact);
    }

    /**
     * @test
     */
    public function testReadNutiritionFact()
    {
        $nutiritionFact = $this->makeNutiritionFact();
        $this->json('GET', '/api/v1/nutiritionFacts/'.$nutiritionFact->id);

        $this->assertApiResponse($nutiritionFact->toArray());
    }

    /**
     * @test
     */
    public function testUpdateNutiritionFact()
    {
        $nutiritionFact = $this->makeNutiritionFact();
        $editedNutiritionFact = $this->fakeNutiritionFactData();

        $this->json('PUT', '/api/v1/nutiritionFacts/'.$nutiritionFact->id, $editedNutiritionFact);

        $this->assertApiResponse($editedNutiritionFact);
    }

    /**
     * @test
     */
    public function testDeleteNutiritionFact()
    {
        $nutiritionFact = $this->makeNutiritionFact();
        $this->json('DELETE', '/api/v1/nutiritionFacts/'.$nutiritionFact->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/nutiritionFacts/'.$nutiritionFact->id);

        $this->assertResponseStatus(404);
    }
}
