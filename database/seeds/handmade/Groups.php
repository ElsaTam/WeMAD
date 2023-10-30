<?php

$clans = [
	[
		'id' => 'clan_lasvegas',
		'group_type_id' => 'clan',
		'name' => 'de Las Vegas',
		'leader_id' => 'williamadan',
		'office_id' => 'office_lasvegas_nv',
		'created_at' => NULL,'updated_at' => NULL
	],
	
	[
		'id' => 'clan_nouvelleorleans_la',
		'group_type_id' => 'clan',
		'name' => 'de la Nouvelle Orléans',
		'leader_id' => 'margaretlowery',
		'office_id' => 'office_nouvelleorleans_la',
		'created_at' => NULL,'updated_at' => NULL
	],
];

$circles = [
	[
		'id' => 'circle_lasvegas',
		'group_type_id' => 'circle',
		'name' => 'de Las Vegas',
		'leader_id' => 'riverlee',
		'office_id' => 'office_lasvegas_nv',
		'created_at' => NULL,'updated_at' => NULL
	],

	[
		'id' => 'circle_phoenix',
		'group_type_id' => 'circle',
		'name' => 'de Phoenix',
		'leader_id' => 'dagandevante',
		'office_id' => 'office_phoenix_az',
		'created_at' => NULL,'updated_at' => NULL
	],
];

$packs = [
	[
		'id' => 'pack_fullmoonriders',
		'group_type_id' => 'pack',
		'name' => 'Full Moon Riders',
		'leader_id' => 'garrettstafford',
		'office_id' => 'office_lasvegas_nv',
		'created_at' => NULL,'updated_at' => NULL
	],
	[
		'id' => 'pack_griffesdevegas',
		'group_type_id' => 'pack',
		'name' => 'Les Griffes de Vegas',
		'leader_id' => 'jacksoncox',
		'office_id' => 'office_lasvegas_nv',
		'created_at' => NULL,'updated_at' => NULL
	],
	[
		'id' => 'pack_nouvelleorleans_la',
		'group_type_id' => 'pack',
		'name' => 'de la Nouvelle-Orléans',
		'leader_id' => 'declansamson',
		'office_id' => 'office_nouvelleorleans_la',
		'created_at' => NULL,'updated_at' => NULL
	]
];

$groups = array_merge($clans, $circles, $packs);