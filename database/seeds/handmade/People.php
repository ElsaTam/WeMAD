<?php

$vampires = array(
    // Caleb Magnar
    array(
        'id' => "calebmagnar",
        'first_name' => "Caleb",
        'last_name' => "Magnar",
        'status' => "civilian",
        'birth_date' => '08/05/1760',
        'sex' => "male",
        'type' => "vampire",
        'languages' => "Anglais",
        'dead' => True,
        'place_id' => "office_lasvegas_nv",
        'group_id' => "clan_lasvegas"
    ),

    // Celosia
    array(
        'id' => "celosia",
        'first_name' => "",
        'last_name' => "Celosia",
        'status' => "civilian",
        'birth_date' => '17/09/1895',
        'sex' => "female",
        'type' => "vampire",
        'languages' => "Anglais",
        'dead' => True,
        'place_id' => "office_lasvegas_nv",
        'group_id' => "clan_lasvegas",
        'sire_id' => "calebmagnar"
    ),
    
    // Vernon Langley
    array(
        'id' => "vernonlangley",
        'first_name' => "Vernon",
        'last_name' => "Langley",
        'status' => "civilian",
        'birth_date' => '14/02/1667',
        'sex' => "male",
        'type' => "vampire",
        'languages' => "Anglais, Français",
        'dead' => True,
        'place_id' => "office_losangeles_ca",
        'group_id' => NULL,
        'sire_id' => NULL
    ),

    // William Adan
    array(
        'id' => "williamadan",
        'first_name' => "William",
        'last_name' => "Adan",
        'status' => "civilian",
        'birth_date' => '05/02/1799',
        'sex' => "male",
        'type' => "vampire",
        'languages' => "Anglais, Russe, Français, Espagnol, Algonquin",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "clan_lasvegas",
        'self_control' => True
    ),

    // Abby Cordwell
    array(
        'id' => "abbycordwell",
        'first_name' => "Abbigail",
        'last_name' => "Cordwell",
        'aliases' => "Abbigail Cordwell, Abby",
        'status' => "civilian",
        'birth_date' => '13/06/1996',
        'sex' => "female",
        'type' => "vampire",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "clan_lasvegas",
        'sire_id' => "vernonlangley"
    ),

    // Birdie Tate
    array(
        'id' => "birdietate",
        'first_name' => "Birdie",
        'last_name' => "Tate",
        'status' => "civilian",
        'birth_date' => '26/03/1940',
        'sex' => "female",
        'type' => "vampire",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "clan_lasvegas",
        'sire_id' => "celosia"
    ),

    // Calvin Beck
    array(
        'id' => "calvinbeck",
        'first_name' => "Calvin",
        'last_name' => "Beck",
        'status' => "civilian",
        'birth_date' => '10/11/1918',
        'sex' => "male",
        'type' => "vampire",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "clan_lasvegas"
    ),

    // Charles Gates
    array(
        'id' => "charlesgates",
        'first_name' => "Charles",
        'last_name' => "Gates",
        'status' => "prisoner",
        'birth_date' => '19/09/1975',
        'sex' => "male",
        'type' => "vampire",
        'languages' => "Anglais",
        'place_id' => "prison_moreypeak_nv",
        'group_id' => "clan_lasvegas"
    ),

    // Estella Stout
    array(
        'id' => "estellastout",
        'first_name' => "Estella",
        'last_name' => "Stout",
        'status' => "civilian",
        'birth_date' => '13/11/1941',
        'sex' => "female",
        'type' => "vampire",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "clan_lasvegas"
    ),

    // Leonardo Pezziali
    array(
        'id' => "leonardopezziali",
        'first_name' => "Leonardo",
        'last_name' => "Pezziali",
        'status' => "civilian",
        'birth_date' => '14/08/1755',
        'sex' => "male",
        'type' => "vampire",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "clan_lasvegas",
        'self_control' => True
    ),

    // Martin Clayton
    array(
        'id' => "martinclayton",
        'first_name' => "Martin",
        'last_name' => "Clayton",
        'status' => "civilian",
        'birth_date' => '12/01/1941',
        'sex' => "male",
        'type' => "vampire",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "clan_lasvegas"
    ),

    // Maud Griffith
    array(
        'id' => "maudgriffith",
        'first_name' => "Maud",
        'last_name' => "Griffith",
        'status' => "civilian",
        'birth_date' => '15/12/1960',
        'sex' => "female",
        'type' => "vampire",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "clan_lasvegas"
    ),

    // Margaret Lowery
    array(
        'id' => "margaretlowery",
        'first_name' => "Margaret",
        'last_name' => "Lowery",
        'status' => "civilian",
        'birth_date' => '12/12/1756',
        'sex' => "female",
        'type' => "vampire",
        'languages' => "Anglais, Français, Créole haïtien, Italien",
        'place_id' => "office_nouvelleorleans_la",
        'group_id' => "clan_nouvelleorleans_la",
        'self_control' => True
    )
);

$werewolves = array(
    // Garrett Stafford
   array(
        'id' => "garrettstafford",
        'first_name' => "Garrett",
        'last_name' => "Stafford",
        'status' => "prisoner",
        'birth_date' => '15/12/1980',
        'sex' => "male",
        'type' => "werewolf",
        'languages' => "Anglais",
        'place_id' => "prison_moreypeak_nv",
        'group_id' => "pack_fullmoonriders"
    ),
    
    // Micah Fuchs
   array(
        'id' => "micahfuchs",
        'first_name' => "Micah",
        'last_name' => "Fuchs",
        'aliases' => "Micah Fuchs",
        'status' => "Wanted",
        'birth_date' => '22/03/1996',
        'birth_place' => "Cedar City, Utah, Etats-Unis",
        'hair' => "Blond",
        'eyes' => "Bleus",
        'height' => 188,
        'weight' => 88,
        'sex' => "male",
        'ethnic_group' => "white",
        'type' => "werewolf",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "pack_fullmoonriders"
    ),
    // Leslie Lohflower
   array(
        'id' => "leslielohflower",
        'first_name' => "Leslie",
        'last_name' => "Lohflower",
        'aliases' => "Leslie Lohflower",
        'status' => "Wanted",
        'birth_date' => '16/09/1995',
        'birth_place' => "Santa Barbara, Californie, Etats-Unis",
        'hair' => "Blond",
        'eyes' => "Bleus",
        'height' => 188,
        'weight' => 88,
        'sex' => "male",
        'ethnic_group' => "white",
        'type' => "werewolf",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "pack_fullmoonriders"
    ),
    // Jordan Yeriva
   array(
        'id' => "jordanyeriva",
        'first_name' => "Jordan",
        'last_name' => "Yeriva",
        'birth_date' => '15/12/1987',
        'status' => "prisoner",
        'sex' => "male",
        'type' => "werewolf",
        'languages' => "Anglais, Bulgare",
        'place_id' => "prison_moreypeak_nv",
        'group_id' => "pack_fullmoonriders"
    ),
    // Roy Turner
   array(
        'id' => "royturner",
        'first_name' => "Roy",
        'last_name' => "Turner",
        'status' => "prisoner",
        'birth_date' => '13/06/1986',
        'sex' => "male",
        'type' => "werewolf",
        'languages' => "Anglais, Serbe",
        'place_id' => "prison_moreypeak_nv",
        'group_id' => "pack_fullmoonriders"
    ),
    // Zoe Chapman
   array(
        'id' => "zoechapman",
        'first_name' => "Zoe",
        'last_name' => "Chapman",
        'status' => "prisoner",
        'birth_date' => '30/06/1983',
        'sex' => "female",
        'type' => "werewolf",
        'languages' => "Anglais",
        'place_id' => "prison_moreypeak_nv",
        'group_id' => "pack_fullmoonriders"
    ),
    
    // Jackson Cox
   array(
        'id' => "jacksoncox",
        'first_name' => "Jackson",
        'last_name' => "Cox",
        'status' => "civilian",
        'birth_date' => '03/02/1977',
        'sex' => "male",
        'type' => "werewolf",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "pack_griffesdevegas"
    ),
    // Allie Hooper
   array(
        'id' => "alliehooper",
        'first_name' => "Allie",
        'last_name' => "Hooper",
        'status' => "civilian",
        'birth_date' => '10/02/2006',
        'sex' => "female",
        'type' => "werewolf",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "pack_griffesdevegas"
    ),
    // Anthony Hooper
   array(
        'id' => "anthonyhooper",
        'first_name' => "Anthony",
        'last_name' => "Hooper",
        'status' => "civilian",
        'birth_date' => '21/04/1976',
        'sex' => "male",
        'type' => "werewolf",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "pack_griffesdevegas"
    ),
    // Bess Odell
   array(
        'id' => "bessodell",
        'first_name' => "Bess",
        'last_name' => "Odell",
        'status' => "civilian",
        'birth_date' => '25/05/1981',
        'sex' => "female",
        'type' => "werewolf",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "pack_griffesdevegas"
    ),
    // Kendrick Tendor
   array(
        'id' => "kendricktendor",
        'first_name' => "Kendrick",
        'last_name' => "Tendor",
        'status' => "civilian",
        'birth_date' => '28/07/1953',
        'sex' => "male",
        'type' => "werewolf",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "pack_griffesdevegas"
    ),
    // Lucille Dotson
   array(
        'id' => "lucilledotson",
        'first_name' => "Lucille",
        'last_name' => "Dotson",
        'status' => "civilian",
        'birth_date' => '02/08/1965',
        'sex' => "female",
        'type' => "werewolf",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "pack_griffesdevegas"
    ),
    // Nora Gibbons
   array(
        'id' => "noragibbons",
        'first_name' => "Nora",
        'last_name' => "Gibbons",
        'birth_date' => '13/09/1961',
        'status' => "civilian",
        'sex' => "female",
        'type' => "werewolf",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "pack_griffesdevegas"
    ),
    // Ozzy Wade
   array(
        'id' => "ozzywade",
        'first_name' => "Ozzy",
        'last_name' => "Wade",
        'status' => "civilian",
        'birth_date' => '21/03/1962',
        'sex' => "male",
        'type' => "werewolf",
        'languages' => "Anglais, Féérique, Démoniaque",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "pack_griffesdevegas"
    ),
    // Victor Mooney
   array(
        'id' => "victormooney",
        'first_name' => "Victor",
        'last_name' => "Mooney",
        'status' => "civilian",
        'birth_date' => '10/11/1968',
        'sex' => "male",
        'type' => "werewolf",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "pack_griffesdevegas"
    ),
    
    // Declan Samson
   array(
        'id' => "declansamson",
        'first_name' => "Declan",
        'last_name' => "Samson",
        'status' => "prisoner",
        'birth_date' => '03/02/1977',
        'sex' => "male",
        'type' => "werewolf",
        'languages' => "Anglais, Français",
        'place_id' => "prison_homochitto_ms",
        'group_id' => "pack_nouvelleorleans_la"
    )
);

$warlocks = array(
    // River Lee
    array(
        'id' => "riverlee",
        'first_name' => "River",
        'last_name' => "Lee",
        'status' => "civilian",
        'birth_date' => '15/12/1435',
        'sex' => "female",
        'type' => "warlock",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "circle_lasvegas"
    ),

    // Aden McGuire
    array(
        'id' => "adenmcguire",
        'first_name' => "Aden",
        'last_name' => "McGuire",
        'status' => "civilian",
        'birth_date' => '12/04/1753',
        'sex' => "male",
        'type' => "warlock",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "circle_lasvegas"
    ),

    // Corey Hunt
    array(
        'id' => "coreyhunt",
        'first_name' => "Corey",
        'last_name' => "Hunt",
        'status' => "civilian",
        'birth_date' => '11/09/1813',
        'sex' => "male",
        'type' => "warlock",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "circle_lasvegas"
    ),

    // Sharon Kennedy
    array(
        'id' => "sharonkennedy",
        'first_name' => "Sharon",
        'last_name' => "Kennedy",
        'status' => "prisoner",
        'birth_date' => '05/10/1930',
        'sex' => "female",
        'type' => "warlock",
        'languages' => "Anglais",
        'place_id' => "prison_moreypeak_nv",
        'group_id' => "circle_lasvegas"
    ),

    // Kharak Roshan
    array(
        'id' => "kharakroshan",
        'first_name' => "Kharak",
        'last_name' => "Roshan",
        'status' => "civilian",
        'birth_date' => '01/01/-1500',
        'sex' => "male",
        'type' => "warlock",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
        'group_id' => "circle_lasvegas"
    ),

    // Dagan Devante
    array(
        'id' => "dagandevante",
        'first_name' => "Dagan",
        'last_name' => "Devante",
        'status' => "civilian",
        'birth_date' => '01/01/1261',
        'sex' => "male",
        'type' => "warlock",
        'languages' => "Anglais",
        'place_id' => "office_phoenix_az",
        'group_id' => "circle_phoenix"
    )
);



$lasvegas_agents = array(
    // Alec Cohen Sarajevic
    array(
        'id' => "aleccohensarajevic",
        'first_name' => "Alec",
        'last_name' => "Cohen Sarajevic",
        'status' => "agent",
        'birth_date' => '30/05/1978',
        'birth_place' => "Kragujevac, Yougoslavie",
        'sex' => "male",
        'ethnic_group' => "white",
        'type' => "human",
        'languages' => "Anglais",
        'place_id' => "office_lasvegas_nv",
    ),
);

$phoenix_agents = array(
    // Vera
    array(
        'id' => "veraframirez",
        'first_name' => "Vera",
        'last_name' => "F. Ramirez",
        'status' => "agent",
        'birth_date' => '15/06/1968',
        'birth_place' => "Tucson Estates, Arizona, Etats-Unis",
        'sex' => "female",
        'ethnic_group' => "hispanic",
        'type' => "human",
        'languages' => "Anglais, Espagnole",
        'place_id' => "office_phoenix_az",
    ),
);

$agents = array_merge($lasvegas_agents, $phoenix_agents);