<?php

namespace App\Faker;

use App\Faker\Helper;
use App\Faker\PlaceFaker;
use App\Faker\Data\PlacesData;
use App\Custom\Date;
use Illuminate\Support\Facades\DB;

class PersonFaker
{
    public $helper;

    function __construct()
    {
        $this->helper = new Helper();
    }

    // ======================================================== //
    // ============         CREATE ENTITY         ============= //
    // ======================================================== //

    public function person(?string $type)
    {
        include 'Data\BirthPlaces.php';
        $place_faker = new PlaceFaker();

        if (!$type) $type = $this->type();

        // Pick the office
        $office_id = $place_faker->office();
        // Pick the sex
        $sex = $this->sex();
        // Pick the birth date
        $birth_date = $this->birth_date($type);
        $age = $birth_date ? Date::parse($birth_date)->age() : -1;
        // Pick a random country
        $usa_proba = $this->helper->usa_proba($age);
        $key_country = $place_faker->country($usa_proba);
        // Ethnic group (White, Black, Hispanic, etc.)
        $ethnic_group = $countries[$key_country]["ethnic_group"];
        // Pick the birth place
        $birth_place = $place_faker->birth_place($key_country, 100);
        // Pick the name
        $names = $this->names($sex, $key_country);
        // Pick the height and weight
        $height = $this->height();
        $weight = $this->weight($height);
        // Pick hair and eyes
        $can_be_bald = $type == "human" && $sex == "male";
        $hair = $this->hair($key_country, $age, $can_be_bald);
        $eyes = $this->eyes($ethnic_group);
        // Pick languages
        $languages = $this->languages($key_country);

        $person = [
            'id' => $names['id'],
            'first_name' => $names['first_name'],
            'last_name' => $names['last_name'],
            'aliases' => $names['aliases'],
            'birth_place' => $birth_place,
            'birth_date' => $birth_date,
            'hair' => $hair,
            'eyes' => $eyes,
            'sex' => $sex,
            'height' => $height,
            'weight' => $weight,
            'ethnic_group' => $ethnic_group,
            'type' => $type,
            'languages' => $languages,
            'place_id' => $office_id
        ];

        if ($type == "vampire") {
            $person['self_control'] = $this->self_control($age);
        }

        return $person;
    }

    // ======================================================== //
    // ============       CREATE ATTRIBUTES        ============ //
    // ======================================================== //

    
    // ************ SHARED

    public function type()
    {
        return $this->helper->weighted_random([
            'human' => 10,
            'werewolf' => 3,
            'vampire' => 4,
            'warlock' => 8,
            'unknown' => 1
        ]);
    }

    public function names(string $sex, string $key_country)
    {
        $first_name = $this->first_name($sex, $key_country);
        $last_name = $this->last_name($sex, $key_country);
        $id = $this->helper->create_id($first_name, $last_name);

        while (DB::table('people')->find($id)) {
            $first_name = $this->first_name($sex, $key_country);
            $last_name = $this->last_name($sex, $key_country);
            $id = $this->helper->create_id($first_name, $last_name);
        }

        return [
            'id' => $id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'aliases' => $this->helper->create_aliases($first_name, $last_name),
        ];
    }

    public function first_name(string $sex, string $key_country)
    {
        include 'Data/Names.php';

        $key_country_eq = $country_for_names[$key_country];
        $names = ${$key_country_eq.'_'.$sex};

        $name1 = $this->helper->normalize_case($names[array_rand($names)]);

        switch ($key_country_eq) {
            case "russia":
                if ($sex == "male")
                    return $name1." ".$this->helper->normalize_case($russia_patro[array_rand($russia_patro)])."ich";
                else
                    return $name1." ".$this->helper->normalize_case($russia_patro[array_rand($russia_patro)])."na";
            case "ukraine":
                if ($sex == "female")
                    return $name1." ".$this->helper->normalize_case($ukraine_patro[array_rand($ukraine_patro)])."ych";
                else
                    return $name1." ".$this->helper->normalize_case($ukraine_patro[array_rand($ukraine_patro)])."na";
        }

        return $name1;
    }

    public function last_name(string $sex, string $key_country)
    {
        include 'Data/Names.php';

        $key_country_eq = $country_for_names[$key_country];

        switch ($key_country_eq) {
            case "spain":
                $name1 = $spain_lastname[array_rand($spain_lastname)];
                $name2 = $spain_lastname[array_rand($spain_lastname)];
                return $this->helper->weighted_random([
                    $name1 => 8,
                    $name1.' de '.$name2 => 1,
                    $name1.' y '.$name2 => 1
                ]);

            case "arabic":
                $father = $arabic_male[array_rand($arabic_male)];
                $god = $arabic_laqab[array_rand($arabic_laqab)];
                $surname = $arabic_lastname[array_rand($arabic_lastname)];
                if ($sex == "male") {
                    $nasab = $this->helper->weighted_random(["Ibn" => 5, "Bin Abi" => 1]).$father;
                    $laqab = "Abdul-".$god;
                }
                else {
                    $nasab = $this->helper->weighted_random(["Bint" => 5, "Bint Abi" => 1]).$father;
                    $laqab = "Amatul-".$god;
                }
                $possibilities = [
                    $nasab,
                    $nasab.' '.$surname,
                    $laqab,
                    $laqab.' '.$surname
                ];
                return $this->helper->normalize_case($possibilities[array_rand($possibilities)]);
            
            case "russia":
                if ($sex == "male") {
                    $rdn = rand(1, 200+5+20+5+25);
                    if ($rdn < 200) return $russia_lastname_v[array_rand($russia_lastname_v)];
                    if ($rdn < 205) return $russia_lastname_sk[array_rand($russia_lastname_sk)]."i";
                    if ($rdn < 225) return $russia_lastname_sk[array_rand($russia_lastname_sk)]."y";
                    if ($rdn < 230) return $russia_lastname_sk[array_rand($russia_lastname_sk)]."iy";
                    else return $russia_lastname_n[array_rand($russia_lastname_n)];
                }
                else {
                    $rdn = rand(1, 300+50+25);
                    if ($rdn < 300) return $russia_lastname_v[array_rand($russia_lastname_v)]."a";
                    if ($rdn < 350) return $russia_lastname_sk[array_rand($russia_lastname_sk)]."aya";
                    else return $russia_lastname_n[array_rand($russia_lastname_n)];
                }
            
            case "ukraine":
                $rdn = rand(1, 30+10+5);
                if ($sex == "male") {
                    if ($rdn < 30) return $ukraine_lastname_n[array_rand($ukraine_lastname_n)];
                    if ($rdn < 40) return $ukraine_lastname_v[array_rand($ukraine_lastname_v)];
                    else return $ukraine_lastname_sk[array_rand($ukraine_lastname_sk)]."yi";
                }
                else {
                    $rdn = rand(1, 300+50+25);
                    if ($rdn < 30) return $ukraine_lastname_n[array_rand($ukraine_lastname_n)];
                    if ($rdn < 40) return $ukraine_lastname_v[array_rand($ukraine_lastname_v)]."a";
                    else return $ukraine_lastname_sk[array_rand($ukraine_lastname_sk)]."aya";
                }

            case "greece":
                if ($sex == "male") return $greece_lastname_male[array_rand($greece_lastname_male)];
                else return $greece_lastname_female[array_rand($greece_lastname_female)];
        }

        $names = ${$key_country_eq.'_lastname'};
        return $this->helper->normalize_case($names[array_rand($names)]);
    }

    public function sex()
    {
        return $this->helper->weighted_random([
            'male' => 1,
            'female' => 1
        ]);
    }

    public function height()
    {
        $height = $this->helper->stats_rand_gen_normal(1.7, 0.1);
        return max(1.4, min(2.2, $height)) * 100 + rand(0, 9);
    }

    public function weight(int $height)
    {
        $cateogry = $this->helper->weighted_random([
            "severe_thinness" => 0,
            "moderate_thinness" => 2,
            "mild_thinness" => 8,
            "average" => 50,
            "pre_obese" => 30,
            "obese_class_1" => 7,
            "obese_class_2" => 3,
            "obese_class_3" => 0
        ]);

        switch ($cateogry) {
            case "severe_thinness":
                $bmi = rand(150, 159) / 10;
                break;
            case "moderate_thinness":
                $bmi = rand(160, 169) / 10;
                break;
            case "mild_thinness":
                $bmi = rand(170, 184) / 10;
                break;
            case "average":
                $bmi = rand(185, 249) / 10;
                break;
            case "pre_obese":
                $bmi = rand(250, 299) / 10;
                break;
            case "obese_class_1":
                $bmi = rand(300, 349) / 10;
                break;
            case "obese_class_2":
                $bmi = rand(350, 399) / 10;
                break;
            case "severe_thinness":
                $bmi = rand(400, 410) / 10;
                break;
        }
        return $bmi * ($height / 100) * ($height / 100);
    }

    public function birth_date(string $type)
    {
        $age = 0;
        switch($type) {
            case "human":
                $age = rand(20, 80);
                break;
            case "werewolf":
                $age = rand(17, 100);
                break;
            case "warlock":
                $age = $this->helper->weighted_random([
                    rand(10, 19) => 4,
                    rand(20, 199) => 37,
                    rand(200, 499) => 37,
                    rand(500, 599) => 11,
                    rand(600, 799) => 5,
                    rand(800, 999) => 3,
                    rand(1000, 1499) => 2,
                    rand(1500, 1999) => 1,
                ]);
                break;
            case "vampire":
                $age = $this->helper->weighted_random([
                    rand(10, 19) => 4,
                    rand(20, 199) => 55,
                    rand(200, 499) => 30,
                    rand(500, 599) => 10,
                    rand(600, 800) => 1,
                ]);
                break;
            default:
                return NULL;
        }
        $year = Date::today()->year() - $age;
        $month = rand(1, 12);
        if ($month == 2) {
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

    public function hair(string $key_country, int $age, bool $can_be_bald)
    {
        if ($can_be_bald) {
            $bald_proba = 0; // Pick as any human of this generation, directly weighted by the population
            if ($age > 80) $bald_proba = 70;
            else if ($age > 70) $bald_proba = 60;
            else if ($age > 60) $bald_proba = 40;
            else if ($age > 50) $bald_proba = 20;
            else if ($age > 40) $bald_proba = 10;
            else if ($age > 30) $bald_proba = 5;
            else if ($age > 20) $bald_proba = 2;
            if (rand(1, 100) < $bald_proba) return "Chauve";
        }

        include 'Data/BirthPlaces.php';

        switch ($key_country) {
            case "ireland":
                return $this->helper->weighted_random([
                    "Noirs" => 10,
                    "Chatains" => 25,
                    "Blonds" => 25,
                    "Roux" => 30
                ]);
            case "italy":
                return $this->helper->weighted_random([
                    "Noirs" => 30,
                    "Chatains" => 55,
                    "Blonds" => 10,
                    "Roux" => 5
                ]);
            case "germany":
            case "poland":
            case "russia":
            case "ukraine":
            case "australia":
                return $this->helper->weighted_random([
                    "Noirs" => 10,
                    "Chatains" => 20,
                    "Blonds" => 60,
                    "Roux" => 20
                ]);
        }

        switch ($countries[$key_country]["ethnic_group"]) {
            case "Asiatique":
                return $this->helper->weighted_random([
                    "Noirs" => 90,
                    "Chatains" => 8,
                    "Blonds" => 1,
                    "Roux" => 1
                ]);
            case "Noire":
                return $this->helper->weighted_random([
                    "Noirs" => 90,
                    "Chatains" => 10
                ]);
            case "Blanche":
                return $this->helper->weighted_random([
                    "Noirs" => 25,
                    "Chatains" => 40,
                    "Blonds" => 25,
                    "Roux" => 10
                ]);
            case "Hispanique":
                return $this->helper->weighted_random([
                    "Noirs" => 75,
                    "Chatains" => 20,
                    "Blonds" => 4,
                    "Roux" => 1
                ]);
        }

        return $this->helper->weighted_random([
            "Noirs" => 40,
            "Chatains" => 50,
            "Blonds" => 10
        ]);
    }

    public function eyes(string $ethnic_group)
    {
        switch ($ethnic_group) {
            case "white":
                return $this->helper->weighted_random([
                    "Bleus clairs" => 1,
                    "Bleus" => 30,
                    "Marrons clairs" => 1,
                    "Marrons" => 33,
                    "Noirs" => 1,
                    "Verts" => 15,
                    "Noisettes" => 16,
                    "Gris" => 1
                ]);
            case "black":
                return $this->helper->weighted_random([
                    "Bleus clairs" => 0,
                    "Bleus" => 0,
                    "Marrons clairs" => 1,
                    "Marrons" => 84,
                    "Noirs" => 12,
                    "Verts" => 0,
                    "Noisettes" => 1,
                    "Gris" => 0
                ]);
            case "asian":
                return $this->helper->weighted_random([
                    "Bleus clairs" => 0,
                    "Bleus" => 5,
                    "Marrons clairs" => 1,
                    "Marrons" => 60,
                    "Noirs" => 30,
                    "Verts" => 0,
                    "Noisettes" => 2,
                    "Gris" => 2
                ]);
            case "hispanic":
                return $this->helper->weighted_random([
                    "Bleus clairs" => 0,
                    "Bleus" => 2,
                    "Marrons clairs" => 2,
                    "Marrons" => 79,
                    "Noirs" => 6,
                    "Verts" => 4,
                    "Noisettes" => 5,
                    "Gris" => 0
                ]);
            case "nativeamerican":
                return $this->helper->weighted_random([
                    "Bleus clairs" => 1,
                    "Bleus" => 10,
                    "Marrons clairs" => 1,
                    "Marrons" => 61,
                    "Noirs" => 5,
                    "Verts" => 5,
                    "Noisettes" => 16,
                    "Gris" => 1
                ]);
            case "unknown":
                return $this->helper->weighted_random([
                    "Bleus clairs" => 1,
                    "Bleus" => 26,
                    "Marrons clairs" => 1,
                    "Marrons" => 45,
                    "Noirs" => 2,
                    "Verts" => 9,
                    "Noisettes" => 18,
                    "Gris" => 1
                ]);
        }
    }

    public function languages(string $key_country)
    {
        include 'Data/BirthPlaces.php';

        $all_languages = [
            // "Anglais" => 1348,
            "Mandarin (Chine)" => 1120,
            "Hindi (Inde)" => 600,
            "Espagnol" => 543,
            "Arabe" => 274,
            "Bengali" => 268,
            "Français" => 267,
            "Russe" => 258,
            "Portugais" => 258,
            "Indonésien" => 199,
            "Allemand" => 135,
            "Japonais" => 126,
            "Turc" => 88,
            "Coréen" => 82,
            "Vietnamien" => 82,
            "Haoussa" => 75, // Niger
            "Iranien" => 74,
            "Egyptien" => 70,
            "Swahili" => 69, // Tanzanie
            "Javanais" => 68, // Indonésie
            "Italien" => 68,
            "Thaï" => 61,
            "Amharic" => 57, // Ethiopie
            "Philippin" => 45,
            "Yoruba" => 43, // Niger
            "Birman" => 43,
            "Polonais" => 41
        ];

        $indian_languages = [
            // "Hindi (Inde)" => 600,
            "Urdu (Inde)" => 230,
            "Marathi (Inde)" => 99,
            "Telugu (Inde)" => 96,
            "Tamil (Inde)" => 85,
            "Pendjabi de l'Ouest (Inde)" => 65,
            "Gujarati (Inde)" => 62,
            "Kannada (Inde)" => 59,
            "Pendjabi de l'Est (Inde)" => 52,
            "Odia (Inde)" => 40
        ];

        $chinese_languages = [
            // "Mandarin (Chine)" => 1120,
            "Cantonais (Chine)" => 85,
            "Wu (Chine)" => 82,
            "Minnan (Chine)" => 49,
            "Jin (Chine)" => 47,
            "Hakka (Chine)" => 44,
        ];

        if (mb_strlen($countries[$key_country]["language"]) > 0)
            $languages = explode(', ', $countries[$key_country]["language"]);
        else
            $languages = [];

        // Remove the languages from the pickable array
        foreach ($languages as $lang) {
            unset($all_languages[$lang]);
        }
        // Eventually, pick new languages
        $dialect_prob = 50;
        while (True) {
            // Russian roulette to pick an other language or not (20%)
            if (rand(1, 100) > 20) break;
            // Choose if it is a dialect from the same country or no
            $dialect = false;
            if ($dialect_prob > 0 && $key_country == "india") {
                $dialect = rand(1, 100) < $dialect_prob;
                if ($dialect) {
                    $other = $this->helper->weighted_random($indian_languages);
                }
            }
            else if ($dialect_prob > 0 && $key_country == "china") {
                $dialect = rand(1, 100) < $dialect_prob;
                if ($dialect) {
                    $other = $this->helper->weighted_random($chinese_languages);
                }
            }
            // If a dialect was picked, reduce the probability to have an other one
            if ($dialect) {
                $dialect_prob -= 20;
            }
            // If no dialect was picked, the probability is reduces to zero
            else {
                $dialect_prob = 0;
                // and we pick an other languages
                $other = $this->helper->weighted_random($all_languages);
            }
            array_push($languages, $other);
            unset($all_languages[$other]);
            unset($indian_languages[$other]);
            unset($chinese_languages[$other]);
        }
        
        // Create the string
        $result = "Anglais";
        foreach ($languages as $lang) {
            $result .= ", ".$lang;
        }
        return $result;
    }
    
    // ************ VAMPIRES

    public function self_control(string $age)
    {
        if ($age > 400) return rand(1, 100) < 90;
        if ($age > 300) return rand(1, 100) < 70;
        if ($age > 200) return rand(1, 100) < 50;
        if ($age > 100) return rand(1, 100) < 30;
        return rand(1, 100) < 10;
    }
}