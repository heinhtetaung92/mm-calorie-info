<?php

use Faker\Factory as Faker;
use App\Models\NutiritionFact;
use App\Repositories\NutiritionFactRepository;

trait MakeNutiritionFactTrait
{
    /**
     * Create fake instance of NutiritionFact and save it in database
     *
     * @param array $nutiritionFactFields
     * @return NutiritionFact
     */
    public function makeNutiritionFact($nutiritionFactFields = [])
    {
        /** @var NutiritionFactRepository $nutiritionFactRepo */
        $nutiritionFactRepo = App::make(NutiritionFactRepository::class);
        $theme = $this->fakeNutiritionFactData($nutiritionFactFields);
        return $nutiritionFactRepo->create($theme);
    }

    /**
     * Get fake instance of NutiritionFact
     *
     * @param array $nutiritionFactFields
     * @return NutiritionFact
     */
    public function fakeNutiritionFact($nutiritionFactFields = [])
    {
        return new NutiritionFact($this->fakeNutiritionFactData($nutiritionFactFields));
    }

    /**
     * Get fake data of NutiritionFact
     *
     * @param array $postFields
     * @return array
     */
    public function fakeNutiritionFactData($nutiritionFactFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'name' => $fake->word,
            'calorie' => $fake->word,
            'source' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $nutiritionFactFields);
    }
}
