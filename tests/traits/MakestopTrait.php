<?php

use Faker\Factory as Faker;
use App\Models\stop;
use App\Repositories\stopRepository;

trait MakestopTrait
{
    /**
     * Create fake instance of stop and save it in database
     *
     * @param array $stopFields
     * @return stop
     */
    public function makestop($stopFields = [])
    {
        /** @var stopRepository $stopRepo */
        $stopRepo = App::make(stopRepository::class);
        $theme = $this->fakestopData($stopFields);
        return $stopRepo->create($theme);
    }

    /**
     * Get fake instance of stop
     *
     * @param array $stopFields
     * @return stop
     */
    public function fakestop($stopFields = [])
    {
        return new stop($this->fakestopData($stopFields));
    }

    /**
     * Get fake data of stop
     *
     * @param array $postFields
     * @return array
     */
    public function fakestopData($stopFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'address' => $fake->word,
            'name' => $fake->word,
            'latitude' => $fake->randomDigitNotNull,
            'longitude' => $fake->randomDigitNotNull,
            'status' => $fake->word,
            'road' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $stopFields);
    }
}
