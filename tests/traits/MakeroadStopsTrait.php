<?php

use Faker\Factory as Faker;
use App\Models\roadStops;
use App\Repositories\roadStopsRepository;

trait MakeroadStopsTrait
{
    /**
     * Create fake instance of roadStops and save it in database
     *
     * @param array $roadStopsFields
     * @return roadStops
     */
    public function makeroadStops($roadStopsFields = [])
    {
        /** @var roadStopsRepository $roadStopsRepo */
        $roadStopsRepo = App::make(roadStopsRepository::class);
        $theme = $this->fakeroadStopsData($roadStopsFields);
        return $roadStopsRepo->create($theme);
    }

    /**
     * Get fake instance of roadStops
     *
     * @param array $roadStopsFields
     * @return roadStops
     */
    public function fakeroadStops($roadStopsFields = [])
    {
        return new roadStops($this->fakeroadStopsData($roadStopsFields));
    }

    /**
     * Get fake data of roadStops
     *
     * @param array $postFields
     * @return array
     */
    public function fakeroadStopsData($roadStopsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_road' => $fake->randomDigitNotNull,
            'id_stop' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $roadStopsFields);
    }
}
