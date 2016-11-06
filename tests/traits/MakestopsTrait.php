<?php

use Faker\Factory as Faker;
use App\Models\stops;
use App\Repositories\stopsRepository;

trait MakestopsTrait
{
    /**
     * Create fake instance of stops and save it in database
     *
     * @param array $stopsFields
     * @return stops
     */
    public function makestops($stopsFields = [])
    {
        /** @var stopsRepository $stopsRepo */
        $stopsRepo = App::make(stopsRepository::class);
        $theme = $this->fakestopsData($stopsFields);
        return $stopsRepo->create($theme);
    }

    /**
     * Get fake instance of stops
     *
     * @param array $stopsFields
     * @return stops
     */
    public function fakestops($stopsFields = [])
    {
        return new stops($this->fakestopsData($stopsFields));
    }

    /**
     * Get fake data of stops
     *
     * @param array $postFields
     * @return array
     */
    public function fakestopsData($stopsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'address' => $fake->text,
            'name' => $fake->text,
            'latitude' => $fake->text,
            'longitude' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $stopsFields);
    }
}
