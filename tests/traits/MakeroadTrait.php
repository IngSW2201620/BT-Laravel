<?php

use Faker\Factory as Faker;
use App\Models\road;
use App\Repositories\roadRepository;

trait MakeroadTrait
{
    /**
     * Create fake instance of road and save it in database
     *
     * @param array $roadFields
     * @return road
     */
    public function makeroad($roadFields = [])
    {
        /** @var roadRepository $roadRepo */
        $roadRepo = App::make(roadRepository::class);
        $theme = $this->fakeroadData($roadFields);
        return $roadRepo->create($theme);
    }

    /**
     * Get fake instance of road
     *
     * @param array $roadFields
     * @return road
     */
    public function fakeroad($roadFields = [])
    {
        return new road($this->fakeroadData($roadFields));
    }

    /**
     * Get fake data of road
     *
     * @param array $postFields
     * @return array
     */
    public function fakeroadData($roadFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'route' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $roadFields);
    }
}
