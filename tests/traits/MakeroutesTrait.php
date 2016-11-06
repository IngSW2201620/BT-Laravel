<?php

use Faker\Factory as Faker;
use App\Models\routes;
use App\Repositories\routesRepository;

trait MakeroutesTrait
{
    /**
     * Create fake instance of routes and save it in database
     *
     * @param array $routesFields
     * @return routes
     */
    public function makeroutes($routesFields = [])
    {
        /** @var routesRepository $routesRepo */
        $routesRepo = App::make(routesRepository::class);
        $theme = $this->fakeroutesData($routesFields);
        return $routesRepo->create($theme);
    }

    /**
     * Get fake instance of routes
     *
     * @param array $routesFields
     * @return routes
     */
    public function fakeroutes($routesFields = [])
    {
        return new routes($this->fakeroutesData($routesFields));
    }

    /**
     * Get fake data of routes
     *
     * @param array $postFields
     * @return array
     */
    public function fakeroutesData($routesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_assigned_driver' => $fake->randomDigitNotNull,
            'id_assigned_bus' => $fake->randomDigitNotNull,
            'id_road' => $fake->randomDigitNotNull,
            'schedule_time' => $fake->word,
            'id_route_status' => $fake->randomDigitNotNull,
            'starDate' => $fake->word,
            'endDate' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $routesFields);
    }
}
