<?php

use Faker\Factory as Faker;
use App\Models\drivers;
use App\Repositories\driversRepository;

trait MakedriversTrait
{
    /**
     * Create fake instance of drivers and save it in database
     *
     * @param array $driversFields
     * @return drivers
     */
    public function makedrivers($driversFields = [])
    {
        /** @var driversRepository $driversRepo */
        $driversRepo = App::make(driversRepository::class);
        $theme = $this->fakedriversData($driversFields);
        return $driversRepo->create($theme);
    }

    /**
     * Get fake instance of drivers
     *
     * @param array $driversFields
     * @return drivers
     */
    public function fakedrivers($driversFields = [])
    {
        return new drivers($this->fakedriversData($driversFields));
    }

    /**
     * Get fake data of drivers
     *
     * @param array $postFields
     * @return array
     */
    public function fakedriversData($driversFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'first_name' => $fake->text,
            'last_name' => $fake->text,
            'document_type' => $fake->text,
            'document_number' => $fake->text,
            'driving_license_id' => $fake->text,
            'rh' => $fake->text,
            'photo' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $driversFields);
    }
}
