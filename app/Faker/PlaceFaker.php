<?php

namespace App\Faker;

use App\Faker\Helper;
use App\Faker\Data\PlacesData;
use App\Custom\Date;
use Illuminate\Support\Facades\DB;

class PlaceFaker
{
    public $helper;

    function __construct()
    {
        $this->helper = new Helper();
    }

    // ======================================================== //
    // ============       CREATE ATTRIBUTES        ============ //
    // ======================================================== //

    /**
     * Pick an origin country based on the population of immigrants
     * @param  int  $usa_proba  The probability to have someone from the usa. If -1, usa will be weighted as the others (with its population)
     * @return string Returns the key of the country
     */
    public function country(int $usa_proba = -1)
    {
        if (rand(1, 100) < $usa_proba) return "usa";

        include 'Data/BirthPlaces.php';
        $weighted_countries = [];
        foreach ($countries as $key => $value) {
            if ($key == "usa" && $usa_proba > 0) continue;
            $weighted_countries[$key] = $value["population"];
        }
        return $this->helper->weighted_random($weighted_countries);
    }

    /**
     * Pick a birth place, depending on the origin country.
     * The person can be of a foreign origin from its ancesters, but born in the united states.
     * @param string $key_country The key of the origin country
     * @param int $immigrant_proba The probability to be born outside the usa (in the origin country)
     * @return string Returns the place of birth
     */
    public function birth_place(string $key_country, int $immigrant_proba)
    {
        include 'Data/BirthPlaces.php';

        // Direct immigrant, born in another country
        if ($key_country != "usa" && rand(1, 100) < $immigrant_proba) {
            return $this->helper->weighted_random(${$key_country."_cities"}).", ".$countries[$key_country]["country"];
        }

        // Either a child of former immigrants, or an american
        return $this->helper->weighted_random($usa_cities).", Etats-Unis";
    }

    /**
     * Pick a random office
     * @return string Returns the ID of the office
     */
    public function office()
    {
        $offices = PlacesData::offices();
        foreach ($offices as $id => $value) {
            $offices_id[$id] = $value['proba'];
        }
        return $this->helper->weighted_random($offices_id);
    }

    /**
     * Pick a random state of the USA
     * @return string Returns the ID of the state
     */
    public function state()
    {
        $states = PlacesData::states();
        return array_rand($states);
    }

    /**
     * Pick a random city of the USA
     * @return string Returns the name of the city
     */
    public function usa_city(?string $state)
    {
        include "Data\BirthPlaces.php";

        if (! $state) return $this->helper->weighted_random($usa_cities);

        $state_name = PlacesData::states()[$state]['name'];
        $cities = array_filter($usa_cities, function($key) use($state_name) {
            return str_contains($key, $state_name);
        }, ARRAY_FILTER_USE_KEY);
        return $this->helper->weighted_random($cities);
    }
}