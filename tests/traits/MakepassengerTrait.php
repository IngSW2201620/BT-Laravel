<?php

use Faker\Factory as Faker;
use App\Models\passenger;
use App\Repositories\passengerRepository;

trait MakepassengerTrait
{
    /**
     * Create fake instance of passenger and save it in database
     *
     * @param array $passengerFields
     * @return passenger
     */
    public function makepassenger($passengerFields = [])
    {
        /** @var passengerRepository $passengerRepo */
        $passengerRepo = App::make(passengerRepository::class);
        $theme = $this->fakepassengerData($passengerFields);
        return $passengerRepo->create($theme);
    }

    /**
     * Get fake instance of passenger
     *
     * @param array $passengerFields
     * @return passenger
     */
    public function fakepassenger($passengerFields = [])
    {
        return new passenger($this->fakepassengerData($passengerFields));
    }

    /**
     * Get fake data of passenger
     *
     * @param array $postFields
     * @return array
     */
    public function fakepassengerData($passengerFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'balance' => $fake->randomDigitNotNull,
            'user' => $fake->randomDigitNotNull,
            'ticket' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $passengerFields);
    }
}
