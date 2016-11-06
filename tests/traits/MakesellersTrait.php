<?php

use Faker\Factory as Faker;
use App\Models\sellers;
use App\Repositories\sellersRepository;

trait MakesellersTrait
{
    /**
     * Create fake instance of sellers and save it in database
     *
     * @param array $sellersFields
     * @return sellers
     */
    public function makesellers($sellersFields = [])
    {
        /** @var sellersRepository $sellersRepo */
        $sellersRepo = App::make(sellersRepository::class);
        $theme = $this->fakesellersData($sellersFields);
        return $sellersRepo->create($theme);
    }

    /**
     * Get fake instance of sellers
     *
     * @param array $sellersFields
     * @return sellers
     */
    public function fakesellers($sellersFields = [])
    {
        return new sellers($this->fakesellersData($sellersFields));
    }

    /**
     * Get fake data of sellers
     *
     * @param array $postFields
     * @return array
     */
    public function fakesellersData($sellersFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'first_name' => $fake->text,
            'last_name' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $sellersFields);
    }
}
