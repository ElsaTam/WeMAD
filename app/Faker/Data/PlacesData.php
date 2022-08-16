<?php

namespace App\Faker\Data;

class PlacesData {

    public static function states()
    {
        $states = array(
            "AZ" => array(
                'name' => "Arizona",
                'council' => "west"
            ),
            "CA" => array(
                'name' => "Californie",
                'council' => "west"
            ),
            "CO" => array(
                'name' => "Colorado",
                'council' => "west"
            ),
            "ID" => array(
                'name' => "Idaho",
                'council' => "west"
            ),
            "MT" => array(
                'name' => "Montana",
                'council' => "west"
            ),
            "NM" => array(
                'name' => "Nouveau-Mexique",
                'council' => "west"
            ),
            "NV" => array(
                'name' => "Nevada",
                'council' => "west"
            ),
            "OR" => array(
                'name' => "Oregon",
                'council' => "west"
            ),
            "UT" => array(
                'name' => "Utah",
                'council' => "west"
            ),
            "WA" => array(
                'name' => "Washington",
                'council' => "west"
            ),
            "WY" => array(
                'name' => "Wyoming",
                'council' => "west"
            ),
        
        
        
            "AR" => array(
                'name' => "Arkansas",
                'council' => "center"
            ),
            "IA" => array(
                'name' => "Iowa",
                'council' => "center"
            ),
            "IL" => array(
                'name' => "Illinois",
                'council' => "center"
            ),
            "KS" => array(
                'name' => "Kansas",
                'council' => "center"
            ),
            "LA" => array(
                'name' => "Louisiane",
                'council' => "center"
            ),
            "MN" => array(
                'name' => "Minnesota",
                'council' => "center"
            ),
            "MO" => array(
                'name' => "Missouri",
                'council' => "center"
            ),
            "ND" => array(
                'name' => "Dakota du Nord",
                'council' => "center"
            ),
            "NE" => array(
                'name' => "Nebraska",
                'council' => "center"
            ),
            "OK" => array(
                'name' => "Oklahoma",
                'council' => "center"
            ),
            "SD" => array(
                'name' => "Dakota du Sud",
                'council' => "center"
            ),
            "TX" => array(
                'name' => "Texas",
                'council' => "center"
            ),
            "WI" => array(
                'name' => "Wisconsin",
                'council' => "center"
            ),
        
        
        
            "AL" => array(
                'name' => "Alabama",
                'council' => "east"
            ),
            "DC" => array(
                'name' => "District de Colombie",
                'council' => "east"
            ),
            "FL" => array(
                'name' => "Floride",
                'council' => "east"
            ),
            "GA" => array(
                'name' => "Géorgie",
                'council' => "east"
            ),
            "IN" => array(
                'name' => "Indiana",
                'council' => "east"
            ),
            "KY" => array(
                'name' => "Kentucky",
                'council' => "east"
            ),
            "ME" => array(
                'name' => "Maine",
                'council' => "east"
            ),
            "MI" => array(
                'name' => "Michigan",
                'council' => "east"
            ),
            "MS" => array(
                'name' => "Mississippi",
                'council' => "east"
            ),
            "NC" => array(
                'name' => "Caroline du Nord",
                'council' => "east"
            ),
            "NY" => array(
                'name' => "New York",
                'council' => "east"
            ),
            "OH" => array(
                'name' => "Ohio",
                'council' => "east"
            ),
            "PA" => array(
                'name' => "Pennsylvanie",
                'council' => "east"
            ),
            "RI" => array(
                'name' => "Rhode Island",
                'council' => "east"
            ),
            "SC" => array(
                'name' => "Caroline du Sud",
                'council' => "east"
            ),
            "TN" => array(
                'name' => "Tennessee",
                'council' => "east"
            ),
            "VA" => array(
                'name' => "Virginie",
                'council' => "east"
            ),
            "WV" => array(
                'name' => "Virginie-Occidentale",
                'council' => "east"
            ),
        
        
        
            "AK" => array(
                'name' => "Alaska",
                'council' => Null
            ),
            "GU" => array(
                'name' => "Guam",
                'council' => Null
            ),
            "HI" => array(
                'name' => "Hawaï",
                'council' => Null
            ),
            "PR" => array(
                'name' => "Porto Rico",
                'council' => Null
            )
        );

        return $states;
    }

    public static function offices()
    {
        $offices = array(
            // Etats de l'Ouest
            "office_phoenix_az" => array(
                'proba' => 1,
                'name' => "Phoenix",
                'state_id' => "AZ"
            ),
            "office_losangeles_ca" => array(
                'proba' => 1,
                'name' => "Los Angeles",
                'state_id' => "CA"
            ),
            "office_sanfrancisco_ca" => array(
                'proba' => 1,
                'name' => "San Francisco",
                'state_id' => "CA"
            ),
            "office_denver_co" => array(
                'proba' => 1,
                'name' => "Denver",
                'state_id' => "CO"
            ),
            "office_boise_id" => array(
                'proba' => 1,
                'name' => "Boise",
                'state_id' => "ID"
            ),
            "office_billings_mt" => array(
                'proba' => 1,
                'name' => "Billings",
                'state_id' => "MT"
            ),
            "office_albuquerque_nm" => array(
                'proba' => 1,
                'name' => "Albuquerque",
                'state_id' => "NM"
            ),
            "office_lasvegas_nv" => array(
                'proba' => 1,
                'name' => "Las Vegas",
                'state_id' => "NV"
            ),
            "office_reno_nv" => array(
                'proba' => 1,
                'name' => "Reno",
                'state_id' => "NV"
            ),
            "office_portland_or" => array(
                'proba' => 1,
                'name' => "Portland",
                'state_id' => "OR"
            ),
            "office_saltlakecity_ut" => array(
                'proba' => 1,
                'name' => "Salt Lake City",
                'state_id' => "UT"
            ),
            "office_seattle_wa" => array(
                'proba' => 1,
                'name' => "Seattle",
                'state_id' => "WA"
            ),
            "office_spokane_wa" => array(
                'proba' => 1,
                'name' => "Spokane",
                'state_id' => "WA"
            ),
            "office_casper_wy" => array(
                'proba' => 1,
                'name' => "Casper",
                'state_id' => "WY"
            ),
    
    
            // Etat du Centre
            "office_littlerock_ar" => array(
                'proba' => 1,
                'name' => "Little Rock",
                'state_id' => "AR"
            ),
            "office_desmoines_ia" => array(
                'proba' => 1,
                'name' => "Des Moines",
                'state_id' => "IA"
            ),
            "office_chicago_il" => array(
                'proba' => 1,
                'name' => "Chicago",
                'state_id' => "IL"
            ),
            "office_kansascity_ks" => array(
                'proba' => 1,
                'name' => "Kansas City",
                'state_id' => "KS"
            ),
            "office_dodgecity_ks" => array(
                'proba' => 1,
                'name' => "Dodge City",
                'state_id' => "KS"
            ),
            "office_nouvelleorleans_la" => array(
                'proba' => 1,
                'name' => "Nouvelle-Orléans",
                'state_id' => "LA"
            ),
            "office_minneapolis_mn" => array(
                'proba' => 1,
                'name' => "Minneapolis",
                'state_id' => "MN"
            ),
            "office_saintlouis_mo" => array(
                'proba' => 1,
                'name' => "Saint-Louis",
                'state_id' => "MO"
            ),
            "office_bismarck_nd" => array(
                'proba' => 1,
                'name' => "Bismarck",
                'state_id' => "ND"
            ),
            "office_lincoln_ne" => array(
                'proba' => 1,
                'name' => "Lincoln",
                'state_id' => "NE"
            ),
            "office_oklahomacity_ok" => array(
                'proba' => 1,
                'name' => "Oklahoma City",
                'state_id' => "OK"
            ),
            "office_rapidcity_sd" => array(
                'proba' => 1,
                'name' => "Rapid City",
                'state_id' => "SD"
            ),
            "office_siouxfalls_sd" => array(
                'proba' => 1,
                'name' => "Sioux Falls",
                'state_id' => "SD"
            ),
            "office_dallas_tx" => array(
                'proba' => 1,
                'name' => "Dallas",
                'state_id' => "TX"
            ),
            "office_odessa_tx" => array(
                'proba' => 1,
                'name' => "Odessa",
                'state_id' => "TX"
            ),
            "office_sanantonio_tx" => array(
                'proba' => 1,
                'name' => "San Antonio",
                'state_id' => "TX"
            ),
            "office_milwaukee_wi" => array(
                'proba' => 1,
                'name' => "Milwaukee",
                'state_id' => "WI"
            ),
    
    
            // Etat de l'Est
            "office_birmingham_al" => array(
                'proba' => 1,
                'name' => "Birmingham",
                'state_id' => "AL"
            ),
            "office_washington_dc" => array(
                'proba' => 10,
                'name' => "Washington",
                'state_id' => "DC"
            ),
            "office_jacksonville_fl" => array(
                'proba' => 1,
                'name' => "Jacksonville",
                'state_id' => "FL"
            ),
            "office_miami_fl" => array(
                'proba' => 1,
                'name' => "Miami",
                'state_id' => "FL"
            ),
            "office_atlanta_ga" => array(
                'proba' => 1,
                'name' => "Atlanta",
                'state_id' => "GA"
            ),
            "office_indianapolis_in" => array(
                'proba' => 1,
                'name' => "Indianapolis",
                'state_id' => "IN"
            ),
            "office_louisville_ky" => array(
                'proba' => 1,
                'name' => "Louisville",
                'state_id' => "KY"
            ),
            "office_bangor_me" => array(
                'proba' => 1,
                'name' => "Bangor",
                'state_id' => "ME"
            ),
            "office_detroit_mi" => array(
                'proba' => 1,
                'name' => "Detroit",
                'state_id' => "MI"
            ),
            "office_jackson_ms" => array(
                'proba' => 1,
                'name' => "Jackson",
                'state_id' => "MS"
            ),
            "office_charlotte_nc" => array(
                'proba' => 1,
                'name' => "Charlotte",
                'state_id' => "NC"
            ),
            "office_newyork_ny" => array(
                'proba' => 1,
                'name' => "New York",
                'state_id' => "NY"
            ),
            "office_watertown_ny" => array(
                'proba' => 1,
                'name' => "Watertown",
                'state_id' => "NY"
            ),
            "office_colombus_oh" => array(
                'proba' => 1,
                'name' => "Colombus",
                'state_id' => "OH"
            ),
            "office_pittsburgh_pa" => array(
                'proba' => 1,
                'name' => "Pittsburgh",
                'state_id' => "PA"
            ),
            "office_philadelphie_pa" => array(
                'proba' => 1,
                'name' => "Philadelphie",
                'state_id' => "PA"
            ),
            "office_providence_ri" => array(
                'proba' => 1,
                'name' => "Providence",
                'state_id' => "RI"
            ),
            "office_charleston_sc" => array(
                'proba' => 1,
                'name' => "Charleston",
                'state_id' => "SC"
            ),
            "office_nashville_tn" => array(
                'proba' => 1,
                'name' => "Nashville",
                'state_id' => "TN"
            ),
            "office_lynchburg_va" => array(
                'proba' => 1,
                'name' => "Lynchburg",
                'state_id' => "VA"
            ),
            "office_charleston_wv" => array(
                'proba' => 1,
                'name' => "Charleston",
                'state_id' => "WV"
            ),
    
    
            // Sans conseil
            "office_anchorage_ak" => array(
                'proba' => 1,
                'name' => "Anchorage",
                'state_id' => "AK"
            ),
            "office_anaktuvukpass_ak" => array(
                'proba' => 1,
                'name' => "Anaktuvuk Pass",
                'state_id' => "AK"
            ),
            "office_hagatna_gu" => array(
                'proba' => 1,
                'name' => "Hagåtña",
                'state_id' => "GU"
            ),
            "office_honolulu_hi" => array(
                'proba' => 1,
                'name' => "Honolulu",
                'state_id' => "HI"
            ),
            "office_waikoloavillage_hi" => array(
                'proba' => 1,
                'name' => "Waikoloa Village",
                'state_id' => "HI"
            ),
            "office_sanjuan_pr" => array(
                'proba' => 1,
                'name' => "San Juan",
                'state_id' => "PR"
            )
        );

        return $offices;
    }

    public static function prisons()
    {
        $prisons = array(
            "prison_moreypeak_nv" => array(
                'name' => "Morey Peak",
                'state_id' => "NV",
                'security_level' => 2
            ),
        
            "prison_homochitto_ms" => array(
                'name' => "Homochitto",
                'state_id' => "MS",
                'security_level' => 2
            )
        );

        return $prisons;
    }
}