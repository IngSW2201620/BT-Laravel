<?php

use Faker\Factory as Faker;
use App\Models\buses;
use App\Repositories\busesRepository;

trait MakebusesTrait
{
    /**
     * Create fake instance of buses and save it in database
     *
     * @param array $busesFields
     * @return buses
     */
    public function makebuses($busesFields = [])
    {
        /** @var busesRepository $busesRepo */
        $busesRepo = App::make(busesRepository::class);
        $theme = $this->fakebusesData($busesFields);
        return $busesRepo->create($theme);
    }

    /**
     * Get fake instance of buses
     *
     * @param array $busesFields
     * @return buses
     */
    public function fakebuses($busesFields = [])
    {
        return new buses($this->fakebusesData($busesFields));
    }

    /**
     * Get fake data of buses
     *
     * @param array $postFields
     * @return array
     */
    public function fakebusesData($busesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'license_plate' => $fake->text,
            'brand' => $fake->text,
            'model' => $fake->randomDigitNotNull,
            'capacity' => $fake->randomDigitNotNull,
            'photo' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $busesFields);
    }
}
