<?php

use Faker\Factory as Faker;
use App\Models\roads;
use App\Repositories\roadsRepository;

trait MakeroadsTrait
{
    /**
     * Create fake instance of roads and save it in database
     *
     * @param array $roadsFields
     * @return roads
     */
    public function makeroads($roadsFields = [])
    {
        /** @var roadsRepository $roadsRepo */
        $roadsRepo = App::make(roadsRepository::class);
        $theme = $this->fakeroadsData($roadsFields);
        return $roadsRepo->create($theme);
    }

    /**
     * Get fake instance of roads
     *
     * @param array $roadsFields
     * @return roads
     */
    public function fakeroads($roadsFields = [])
    {
        return new roads($this->fakeroadsData($roadsFields));
    }

    /**
     * Get fake data of roads
     *
     * @param array $postFields
     * @return array
     */
    public function fakeroadsData($roadsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->text,
            'id_source_stop' => $fake->randomDigitNotNull,
            'id_destination_stop' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $roadsFields);
    }
}
