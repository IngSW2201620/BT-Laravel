<?php

use Faker\Factory as Faker;
use App\Models\tickets;
use App\Repositories\ticketsRepository;

trait MaketicketsTrait
{
    /**
     * Create fake instance of tickets and save it in database
     *
     * @param array $ticketsFields
     * @return tickets
     */
    public function maketickets($ticketsFields = [])
    {
        /** @var ticketsRepository $ticketsRepo */
        $ticketsRepo = App::make(ticketsRepository::class);
        $theme = $this->faketicketsData($ticketsFields);
        return $ticketsRepo->create($theme);
    }

    /**
     * Get fake instance of tickets
     *
     * @param array $ticketsFields
     * @return tickets
     */
    public function faketickets($ticketsFields = [])
    {
        return new tickets($this->faketicketsData($ticketsFields));
    }

    /**
     * Get fake data of tickets
     *
     * @param array $postFields
     * @return array
     */
    public function faketicketsData($ticketsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_owner' => $fake->randomDigitNotNull,
            'id_reserved_route' => $fake->randomDigitNotNull,
            'id_used_route' => $fake->randomDigitNotNull,
            'id_used_stop' => $fake->randomDigitNotNull,
            'used_date' => $fake->word,
            'expiration_date' => $fake->word,
            'id_seller' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $ticketsFields);
    }
}
