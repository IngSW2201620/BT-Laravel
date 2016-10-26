<?php

use Faker\Factory as Faker;
use App\Models\driver;
use App\Repositories\driverRepository;

trait MakedriverTrait
{
    /**
     * Create fake instance of driver and save it in database
     *
     * @param array $driverFields
     * @return driver
     */
    public function makedriver($driverFields = [])
    {
        /** @var driverRepository $driverRepo */
        $driverRepo = App::make(driverRepository::class);
        $theme = $this->fakedriverData($driverFields);
        return $driverRepo->create($theme);
    }

    /**
     * Get fake instance of driver
     *
     * @param array $driverFields
     * @return driver
     */
    public function fakedriver($driverFields = [])
    {
        return new driver($this->fakedriverData($driverFields));
    }

    /**
     * Get fake data of driver
     *
     * @param array $postFields
     * @return array
     */
    public function fakedriverData($driverFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'firstName' => $fake->word,
            'lastName' => $fake->word,
            'photo' => $fake->word,
            'administrator' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $driverFields);
    }
}
