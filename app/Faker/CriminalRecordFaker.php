<?php

namespace App\Faker;

use App\Faker\Helper;
use App\Faker\Data\PlacesData;
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

    public function criminalRecord()
    {
        $n_crimes = $this->helper->weighted_random([
            1 => 70,
            2 => 20,
            3 => 10
        ]);

        $record = [
            'crimes' => $this->crimes($n_crimes),
            'most_wanted' => False,
            'reward' => $this->reward($n_crimes),
            'remarks' => NULL,
            'caution' => NULL,
            'danger' => $this->danger()
        ];

        return $record;
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
}