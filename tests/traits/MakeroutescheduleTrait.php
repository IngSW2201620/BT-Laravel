<?php

use Faker\Factory as Faker;
use App\Models\routeschedule;
use App\Repositories\routescheduleRepository;

trait MakeroutescheduleTrait
{
    /**
     * Create fake instance of routeschedule and save it in database
     *
     * @param array $routescheduleFields
     * @return routeschedule
     */
    public function makerouteschedule($routescheduleFields = [])
    {
        /** @var routescheduleRepository $routescheduleRepo */
        $routescheduleRepo = App::make(routescheduleRepository::class);
        $theme = $this->fakeroutescheduleData($routescheduleFields);
        return $routescheduleRepo->create($theme);
    }

    /**
     * Get fake instance of routeschedule
     *
     * @param array $routescheduleFields
     * @return routeschedule
     */
    public function fakerouteschedule($routescheduleFields = [])
    {
        return new routeschedule($this->fakeroutescheduleData($routescheduleFields));
    }

    /**
     * Get fake data of routeschedule
     *
     * @param array $postFields
     * @return array
     */
    public function fakeroutescheduleData($routescheduleFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'destination' => $fake->word,
            'source' => $fake->word,
            'date' => $fake->word,
            'status' => $fake->word,
            'name' => $fake->word,
            'startingDate' => $fake->word,
            'endingDate' => $fake->word,
            'driver' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $routescheduleFields);
    }
}
