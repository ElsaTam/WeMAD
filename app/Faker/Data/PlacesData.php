<?php

namespace App\Faker\Data;

class PlacesData {

    public static function states()
    {
        $states = [
            "AZ" => [
                'name' => "Arizona",
                'council' => "west"
            ],
            "CA" => [
                'name' => "Californie",
                'council' => "west"
            ],
            "CO" => [
                'name' => "Colorado",
                'council' => "west"
            ],
            "ID" => [
                'name' => "Idaho",
                'council' => "west"
            ],
            "MT" => [
                'name' => "Montana",
                'council' => "west"
            ],
            "NM" => [
                'name' => "Nouveau-Mexique",
                'council' => "west"
            ],
            "NV" => [
                'name' => "Nevada",
                'council' => "west"
            ],
            "OR" => [
                'name' => "Oregon",
                'council' => "west"
            ],
            "UT" => [
                'name' => "Utah",
                'council' => "west"
            ],
            "WA" => [
                'name' => "Washington",
                'council' => "west"
            ],
            "WY" => [
                'name' => "Wyoming",
                'council' => "west"
            ],
        
        
        
            "AR" => [
                'name' => "Arkansas",
                'council' => "center"
            ],
            "IA" => [
                'name' => "Iowa",
                'council' => "center"
            ],
            "IL" => [
                'name' => "Illinois",
                'council' => "center"
            ],
            "KS" => [
                'name' => "Kansas",
                'council' => "center"
            ],
            "LA" => [
                'name' => "Louisiane",
                'council' => "center"
            ],
            "MN" => [
                'name' => "Minnesota",
                'council' => "center"
            ],
            "MO" => [
                'name' => "Missouri",
                'council' => "center"
            ],
            "ND" => [
                'name' => "Dakota du Nord",
                'council' => "center"
            ],
            "NE" => [
                'name' => "Nebraska",
                'council' => "center"
            ],
            "OK" => [
                'name' => "Oklahoma",
                'council' => "center"
            ],
            "SD" => [
                'name' => "Dakota du Sud",
                'council' => "center"
            ],
            "TX" => [
                'name' => "Texas",
                'council' => "center"
            ],
            "WI" => [
                'name' => "Wisconsin",
                'council' => "center"
            ],
        
        
        
            "AL" => [
                'name' => "Alabama",
                'council' => "east"
            ],
            "DC" => [
                'name' => "District de Colombie",
                'council' => "east"
            ],
            "FL" => [
                'name' => "Floride",
                'council' => "east"
            ],
            "GA" => [
                'name' => "Géorgie",
                'council' => "east"
            ],
            "IN" => [
                'name' => "Indiana",
                'council' => "east"
            ],
            "KY" => [
                'name' => "Kentucky",
                'council' => "east"
            ],
            "ME" => [
                'name' => "Maine",
                'council' => "east"
            ],
            "MI" => [
                'name' => "Michigan",
                'council' => "east"
            ],
            "MS" => [
                'name' => "Mississippi",
                'council' => "east"
            ],
            "NC" => [
                'name' => "Caroline du Nord",
                'council' => "east"
            ],
            "NY" => [
                'name' => "New York",
                'council' => "east"
            ],
            "OH" => [
                'name' => "Ohio",
                'council' => "east"
            ],
            "PA" => [
                'name' => "Pennsylvanie",
                'council' => "east"
            ],
            "RI" => [
                'name' => "Rhode Island",
                'council' => "east"
            ],
            "SC" => [
                'name' => "Caroline du Sud",
                'council' => "east"
            ],
            "TN" => [
                'name' => "Tennessee",
                'council' => "east"
            ],
            "VA" => [
                'name' => "Virginie",
                'council' => "east"
            ],
            "WV" => [
                'name' => "Virginie-Occidentale",
                'council' => "east"
            ],
        
        
        
            "AK" => [
                'name' => "Alaska",
                'council' => Null
            ],
            "GU" => [
                'name' => "Guam",
                'council' => Null
            ],
            "HI" => [
                'name' => "Hawaï",
                'council' => Null
            ],
            "PR" => [
                'name' => "Porto Rico",
                'council' => Null
            ],
        ];

        return $states;
    }

    public static function offices()
    {
        $offices = [
            // Etats de l'Ouest
            "office_phoenix_az" => [
                'proba' => 1,
                'name' => "Phoenix",
                'state_id' => "AZ"
            ],
            "office_losangeles_ca" => [
                'proba' => 1,
                'name' => "Los Angeles",
                'state_id' => "CA"
            ],
            "office_sanfrancisco_ca" => [
                'proba' => 1,
                'name' => "San Francisco",
                'state_id' => "CA"
            ],
            "office_denver_co" => [
                'proba' => 1,
                'name' => "Denver",
                'state_id' => "CO"
            ],
            "office_boise_id" => [
                'proba' => 1,
                'name' => "Boise",
                'state_id' => "ID"
            ],
            "office_billings_mt" => [
                'proba' => 1,
                'name' => "Billings",
                'state_id' => "MT"
            ],
            "office_albuquerque_nm" => [
                'proba' => 1,
                'name' => "Albuquerque",
                'state_id' => "NM"
            ],
            "office_lasvegas_nv" => [
                'proba' => 1,
                'name' => "Las Vegas",
                'state_id' => "NV"
            ],
            "office_reno_nv" => [
                'proba' => 1,
                'name' => "Reno",
                'state_id' => "NV"
            ],
            "office_portland_or" => [
                'proba' => 1,
                'name' => "Portland",
                'state_id' => "OR"
            ],
            "office_saltlakecity_ut" => [
                'proba' => 1,
                'name' => "Salt Lake City",
                'state_id' => "UT"
            ],
            "office_seattle_wa" => [
                'proba' => 1,
                'name' => "Seattle",
                'state_id' => "WA"
            ],
            "office_spokane_wa" => [
                'proba' => 1,
                'name' => "Spokane",
                'state_id' => "WA"
            ],
            "office_casper_wy" => [
                'proba' => 1,
                'name' => "Casper",
                'state_id' => "WY"
            ],
    
    
            // Etat du Centre
            "office_littlerock_ar" => [
                'proba' => 1,
                'name' => "Little Rock",
                'state_id' => "AR"
            ],
            "office_desmoines_ia" => [
                'proba' => 1,
                'name' => "Des Moines",
                'state_id' => "IA"
            ],
            "office_chicago_il" => [
                'proba' => 1,
                'name' => "Chicago",
                'state_id' => "IL"
            ],
            "office_kansascity_ks" => [
                'proba' => 1,
                'name' => "Kansas City",
                'state_id' => "KS"
            ],
            "office_dodgecity_ks" => [
                'proba' => 1,
                'name' => "Dodge City",
                'state_id' => "KS"
            ],
            "office_nouvelleorleans_la" => [
                'proba' => 1,
                'name' => "Nouvelle-Orléans",
                'state_id' => "LA"
            ],
            "office_minneapolis_mn" => [
                'proba' => 1,
                'name' => "Minneapolis",
                'state_id' => "MN"
            ],
            "office_saintlouis_mo" => [
                'proba' => 1,
                'name' => "Saint-Louis",
                'state_id' => "MO"
            ],
            "office_bismarck_nd" => [
                'proba' => 1,
                'name' => "Bismarck",
                'state_id' => "ND"
            ],
            "office_lincoln_ne" => [
                'proba' => 1,
                'name' => "Lincoln",
                'state_id' => "NE"
            ],
            "office_oklahomacity_ok" => [
                'proba' => 1,
                'name' => "Oklahoma City",
                'state_id' => "OK"
            ],
            "office_rapidcity_sd" => [
                'proba' => 1,
                'name' => "Rapid City",
                'state_id' => "SD"
            ],
            "office_siouxfalls_sd" => [
                'proba' => 1,
                'name' => "Sioux Falls",
                'state_id' => "SD"
            ],
            "office_dallas_tx" => [
                'proba' => 1,
                'name' => "Dallas",
                'state_id' => "TX"
            ],
            "office_odessa_tx" => [
                'proba' => 1,
                'name' => "Odessa",
                'state_id' => "TX"
            ],
            "office_sanantonio_tx" => [
                'proba' => 1,
                'name' => "San Antonio",
                'state_id' => "TX"
            ],
            "office_milwaukee_wi" => [
                'proba' => 1,
                'name' => "Milwaukee",
                'state_id' => "WI"
            ],
    
    
            // Etat de l'Est
            "office_birmingham_al" => [
                'proba' => 1,
                'name' => "Birmingham",
                'state_id' => "AL"
            ],
            "office_washington_dc" => [
                'proba' => 10,
                'name' => "Washington",
                'state_id' => "DC"
            ],
            "office_jacksonville_fl" => [
                'proba' => 1,
                'name' => "Jacksonville",
                'state_id' => "FL"
            ],
            "office_miami_fl" => [
                'proba' => 1,
                'name' => "Miami",
                'state_id' => "FL"
            ],
            "office_atlanta_ga" => [
                'proba' => 1,
                'name' => "Atlanta",
                'state_id' => "GA"
            ],
            "office_indianapolis_in" => [
                'proba' => 1,
                'name' => "Indianapolis",
                'state_id' => "IN"
            ],
            "office_louisville_ky" => [
                'proba' => 1,
                'name' => "Louisville",
                'state_id' => "KY"
            ],
            "office_bangor_me" => [
                'proba' => 1,
                'name' => "Bangor",
                'state_id' => "ME"
            ],
            "office_detroit_mi" => [
                'proba' => 1,
                'name' => "Detroit",
                'state_id' => "MI"
            ],
            "office_jackson_ms" => [
                'proba' => 1,
                'name' => "Jackson",
                'state_id' => "MS"
            ],
            "office_charlotte_nc" => [
                'proba' => 1,
                'name' => "Charlotte",
                'state_id' => "NC"
            ],
            "office_newyork_ny" => [
                'proba' => 1,
                'name' => "New York",
                'state_id' => "NY"
            ],
            "office_watertown_ny" => [
                'proba' => 1,
                'name' => "Watertown",
                'state_id' => "NY"
            ],
            "office_colombus_oh" => [
                'proba' => 1,
                'name' => "Colombus",
                'state_id' => "OH"
            ],
            "office_pittsburgh_pa" => [
                'proba' => 1,
                'name' => "Pittsburgh",
                'state_id' => "PA"
            ],
            "office_philadelphie_pa" => [
                'proba' => 1,
                'name' => "Philadelphie",
                'state_id' => "PA"
            ],
            "office_providence_ri" => [
                'proba' => 1,
                'name' => "Providence",
                'state_id' => "RI"
            ],
            "office_charleston_sc" => [
                'proba' => 1,
                'name' => "Charleston",
                'state_id' => "SC"
            ],
            "office_nashville_tn" => [
                'proba' => 1,
                'name' => "Nashville",
                'state_id' => "TN"
            ],
            "office_lynchburg_va" => [
                'proba' => 1,
                'name' => "Lynchburg",
                'state_id' => "VA"
            ],
            "office_charleston_wv" => [
                'proba' => 1,
                'name' => "Charleston",
                'state_id' => "WV"
            ],
    
    
            // Sans conseil
            "office_anchorage_ak" => [
                'proba' => 1,
                'name' => "Anchorage",
                'state_id' => "AK"
            ],
            "office_anaktuvukpass_ak" => [
                'proba' => 1,
                'name' => "Anaktuvuk Pass",
                'state_id' => "AK"
            ],
            "office_hagatna_gu" => [
                'proba' => 1,
                'name' => "Hagåtña",
                'state_id' => "GU"
            ],
            "office_honolulu_hi" => [
                'proba' => 1,
                'name' => "Honolulu",
                'state_id' => "HI"
            ],
            "office_waikoloavillage_hi" => [
                'proba' => 1,
                'name' => "Waikoloa Village",
                'state_id' => "HI"
            ],
            "office_sanjuan_pr" => [
                'proba' => 1,
                'name' => "San Juan",
                'state_id' => "PR"
            ],
        ];

        return $offices;
    }

    // https://simplemaps.com/custom/us/Tbbmho3D
    public static function prisons()
    {
        $prisons = [
            "prison_the_rockies_wa" => [
                'name' => "The Rockies",
                'state_id' => "WA",
                'security_level' => 2
            ],

            "prison_tompkins_pass_or" => [
                'name' => "Tompkins Pass",
                'state_id' => "OR",
                'security_level' => 4
            ],

            "prison_salmon_challis_id" => [
                'name' => "Salmon-Challis",
                'state_id' => "ID",
                'security_level' => 2
            ],

            "prison_silver_city_mt" => [
                'name' => "Silver City",
                'state_id' => "MT",
                'security_level' => 3
            ],

            "prison_fort_peck_mt" => [
                'name' => "Fort Peck",
                'state_id' => "MT",
                'security_level' => 1
            ],

            "prison_pathfinder_wy" => [
                'name' => "Pathfinder",
                'state_id' => "WY",
                'security_level' => 2
            ],

            "prison_north_palisade_ca" => [
                'name' => "North Palisade",
                'state_id' => "CA",
                'security_level' => 2
            ],

            "prison_price_ut" => [
                'name' => "Price",
                'state_id' => "UT",
                'security_level' => 1
            ],

            "prison_rifle_co" => [
                'name' => "Rifle",
                'state_id' => "CO",
                'security_level' => 2
            ],

            "prison_moreypeak_nv" => [
                'name' => "Morey Peak",
                'state_id' => "NV",
                'security_level' => 2
            ],

            "prison_pinon_az" => [
                'name' => "Pinon",
                'state_id' => "AZ",
                'security_level' => 2
            ],

            "prison_ventana_az" => [
                'name' => "Ventana",
                'state_id' => "AZ",
                'security_level' => 2
            ],

            "prison_santa_rosa_nm" => [
                'name' => "Santa Rosa",
                'state_id' => "NM",
                'security_level' => 2
            ],

            "prison_gila_nm" => [
                'name' => "Gila",
                'state_id' => "NM",
                'security_level' => 4
            ],
        
            "prison_homochitto_ms" => [
                'name' => "Homochitto",
                'state_id' => "MS",
                'security_level' => 3
            ],
        ];

        return $prisons;
    }
}