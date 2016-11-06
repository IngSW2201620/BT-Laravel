<?php

use Faker\Factory as Faker;
use App\Models\routeStatuses;
use App\Repositories\routeStatusesRepository;

trait MakerouteStatusesTrait
{
    /**
     * Create fake instance of routeStatuses and save it in database
     *
     * @param array $routeStatusesFields
     * @return routeStatuses
     */
    public function makerouteStatuses($routeStatusesFields = [])
    {
        /** @var routeStatusesRepository $routeStatusesRepo */
        $routeStatusesRepo = App::make(routeStatusesRepository::class);
        $theme = $this->fakerouteStatusesData($routeStatusesFields);
        return $routeStatusesRepo->create($theme);
    }

    /**
     * Get fake instance of routeStatuses
     *
     * @param array $routeStatusesFields
     * @return routeStatuses
     */
    public function fakerouteStatuses($routeStatusesFields = [])
    {
        return new routeStatuses($this->fakerouteStatusesData($routeStatusesFields));
    }

    /**
     * Get fake data of routeStatuses
     *
     * @param array $postFields
     * @return array
     */
    public function fakerouteStatusesData($routeStatusesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $routeStatusesFields);
    }
}
