<?php

use Faker\Factory as Faker;
use App\Models\bus;
use App\Repositories\busRepository;

trait MakebusTrait
{
    /**
     * Create fake instance of bus and save it in database
     *
     * @param array $busFields
     * @return bus
     */
    public function makebus($busFields = [])
    {
        /** @var busRepository $busRepo */
        $busRepo = App::make(busRepository::class);
        $theme = $this->fakebusData($busFields);
        return $busRepo->create($theme);
    }

    /**
     * Get fake instance of bus
     *
     * @param array $busFields
     * @return bus
     */
    public function fakebus($busFields = [])
    {
        return new bus($this->fakebusData($busFields));
    }

    /**
     * Get fake data of bus
     *
     * @param array $postFields
     * @return array
     */
    public function fakebusData($busFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'licensePlate' => $fake->word,
            'capacity' => $fake->word,
            'currentLatitude' => $fake->randomDigitNotNull,
            'currenteLongitude' => $fake->randomDigitNotNull,
            'soldSeats' => $fake->randomDigitNotNull,
            'color' => $fake->word,
            'photo' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $busFields);
    }
}
