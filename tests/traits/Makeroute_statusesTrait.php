<?php

use Faker\Factory as Faker;
use App\Models\route_statuses;
use App\Repositories\route_statusesRepository;

trait Makeroute_statusesTrait
{
    /**
     * Create fake instance of route_statuses and save it in database
     *
     * @param array $routeStatusesFields
     * @return route_statuses
     */
    public function makeroute_statuses($routeStatusesFields = [])
    {
        /** @var route_statusesRepository $routeStatusesRepo */
        $routeStatusesRepo = App::make(route_statusesRepository::class);
        $theme = $this->fakeroute_statusesData($routeStatusesFields);
        return $routeStatusesRepo->create($theme);
    }

    /**
     * Get fake instance of route_statuses
     *
     * @param array $routeStatusesFields
     * @return route_statuses
     */
    public function fakeroute_statuses($routeStatusesFields = [])
    {
        return new route_statuses($this->fakeroute_statusesData($routeStatusesFields));
    }

    /**
     * Get fake data of route_statuses
     *
     * @param array $postFields
     * @return array
     */
    public function fakeroute_statusesData($routeStatusesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $routeStatusesFields);
    }
}
