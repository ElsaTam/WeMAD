<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    private function seed_group_types()
    {
        DB::table('group_types')->insert([
            'id' => "clan",
            'name' => "Clan",
            'leader_alias_m' => "Dirigeant",
            'leader_alias_f' => "Dirigeante",
            'kind' => "vampire"
        ]);

        DB::table('group_types')->insert([
            'id' => "circle",
            'name' => "Cercle",
            'leader_alias_m' => "Haut-Sorcier",
            'leader_alias_f' => "Haute-Sorcière",
            'kind' => "warlock"
        ]);

        DB::table('group_types')->insert([
            'id' => "pack",
            'name' => "Meute",
            'leader_alias_m' => "Alpha",
            'leader_alias_f' => "Alpha",
            'kind' => "werewolf"
        ]);

        DB::table('group_types')->insert([
            'id' => "government",
            'name' => "Régime",
            'leader_alias_m' => "Souverain",
            'leader_alias_f' => "Souveraine",
            'kind' => "faery"
        ]);
    }

    private function insert_groups($groups)
    {
        // Insert every group without reference to the leader
        $groups_copy = $groups;
        foreach ($groups_copy as $key => $group) {
            $groups_copy[$key]['leader_id'] = NULL; // Will be updated once the leader has been inserted in wemad.people table
        }
        DB::table('groups')->insert($groups_copy);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed_group_types();
        
        include 'generated/Groups.php';
        $this->insert_groups($groups_generated); // generated

        include 'handmade/Groups.php';
        $this->insert_groups($groups); // handmade
    }
}
