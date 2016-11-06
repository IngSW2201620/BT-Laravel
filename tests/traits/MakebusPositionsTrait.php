<?php

use Faker\Factory as Faker;
use App\Models\busPositions;
use App\Repositories\busPositionsRepository;

trait MakebusPositionsTrait
{
    /**
     * Create fake instance of busPositions and save it in database
     *
     * @param array $busPositionsFields
     * @return busPositions
     */
    public function makebusPositions($busPositionsFields = [])
    {
        /** @var busPositionsRepository $busPositionsRepo */
        $busPositionsRepo = App::make(busPositionsRepository::class);
        $theme = $this->fakebusPositionsData($busPositionsFields);
        return $busPositionsRepo->create($theme);
    }

    /**
     * Get fake instance of busPositions
     *
     * @param array $busPositionsFields
     * @return busPositions
     */
    public function fakebusPositions($busPositionsFields = [])
    {
        return new busPositions($this->fakebusPositionsData($busPositionsFields));
    }

    /**
     * Get fake data of busPositions
     *
     * @param array $postFields
     * @return array
     */
    public function fakebusPositionsData($busPositionsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_bus' => $fake->randomDigitNotNull,
            'latitude' => $fake->randomDigitNotNull,
            'longitude' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $busPositionsFields);
    }
}
