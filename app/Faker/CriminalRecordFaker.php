<?php

namespace App\Faker;

use App\Faker\Helper;
use App\Faker\PlaceFaker;
use App\Custom\Date;
use Illuminate\Support\Facades\DB;

class CriminalRecordFaker
{
    public $helper;

    function __construct()
    {
        $this->helper = new Helper();
    }

    // ======================================================== //
    // ============         CREATE ENTITY         ============= //
    // ======================================================== //

    public function criminalRecord($n_crimes)
    {
        $record = [
            'most_wanted' => False,
            'reward' => $this->reward($n_crimes),
            'remarks' => NULL,
            'caution' => NULL,
            'danger' => $this->danger()
        ];

        return $record;
    }

    public function prisonerRecord($n_crimes)
    {
        $record = [
            'entry_date' => $this->crime_date(),
            'sentence' => $this->sentence_months($n_crimes),
            'psychological_notes' => NULL,
            'other_notes' => NULL
        ];

        return $record;
    }

    public function crime(?string $status = NULL)
    {
        $place_faker = new PlaceFaker();
        $state_id = $place_faker->state();
        
        $crime = [
            'charge' => $this->crimes(1),
            'city' => $place_faker->usa_city($state_id),
            'state_id' => $state_id,
            'date' => $this->crime_date(),
            'disposition' => $this->disposition($status)
        ];

        return $crime;
    }


    // ======================================================== //
    // ============       CREATE ATTRIBUTES        ============ //
    // ======================================================== //

    public function crimes(int $n_crimes)
    {
        include 'Data/Crimes.php';

        $selected_crimes = array_rand($crimes, $n_crimes);
        if ($n_crimes == 1) {
            return $crimes[$selected_crimes];
        }
        $result = "";
        foreach ($selected_crimes as $crime_id) {
            $result .= $crimes[$crime_id] . " ; ";
        }
        $result = substr($result, 0, -3);
        return $result;
    }

    public function reward(int $n_crimes)
    {
        $rand;
        switch ($n_crimes) {
            case 1:
                $rand = rand(1, 10) * 1000;
                break;
            case 2:
                $rand = rand(5, 100) * 1000;
                break;
            case 3:
                $rand = rand(10, 300) * 1000;
                break;
        }
        if ($rand > 10000) return $this->helper->roundUpToAny($rand, 5000);
        if ($rand > 100000) return $this->helper->roundUpToAny($rand, 10000);
        if ($rand > 200000) return $this->helper->roundUpToAny($rand, 50000);
        return $rand;
    }
    
    public function danger()
    {
        include 'Data/Dangers.php';
        if (rand(1, 100) < 50) return NULL;
        
        $danger = "A considerer "
            .$this->helper->weighted_random($danger_level)
            ." dangereux";
        $n_supplements = $this->helper->weighted_random([0 => 30, 1 => 65, 2 => 5]);
        if ($n_supplements == 1) {
            $danger .= " et armé";
        }
        elseif ($n_supplements == 2) {
            $danger .= ", armé et ".$this->helper->weighted_random($supplements);
        }
        $danger = str_replace("  ", " ", $danger);
        return $danger;
    }

    public function crime_date(?int $age = 80)
    {
        if (! $age) $age = 80;
        $passed_years = rand(0, min($age - 10, 150));

        $year = Date::today()->year() - $passed_years;

        $month = $passed_years == 0 ? rand(1, Date::today()->month()) : rand(1, 12);

        if ($passed_years == 0 && $month == Date::today()->month()) {
            $day = rand(1, Date::today()->day());
        }
        elseif ($month == 2) {
            $day = rand(1, 28);
        }
        elseif ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
            $day = rand(1, 30);
        }
        else {
            $day = rand(1, 31);
        }
        $date = new Date($year, $month, $day);

        return $date->to_string();
    }

    public function sentence_months(int $n_crimes = 1)
    {
        $years = rand(10 * $n_crimes - 1, 20 * $n_crimes);
        $months = $years == 0 ? rand(3, 11) : $this->helper->weighted_random([0 => 9, rand(1, 11) => 1]);
        return 12 * $years + $months;
    }

    public function disposition(?string $status)
    {
        if ($status == 'prisoner') return $this->helper->weighted_random(['convicted' => 9, 'suspended' => 1]);
        if ($status == 'wanted') return $this->helper->weighted_random(['convicted' => 7, 'diversion' => 1, 'pending' => 15, 'suspended' => 2]);
        else return $this->helper->weighted_random(['discharged' => 1, 'convicted' => 1, 'diversion' => 2, 'acquitted' => 0, 'no_charges_filed' => 0, 'vacated' => 2, 'pending' => 6, 'suspended' => 2]);
    }
}