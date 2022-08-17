<?php

use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    private function seed_wanteds()
    {
        // Basriel Nix
        DB::table('photos')->insert([
            'id' => "basrielnix_2",
            'src' => "/storage/pictures/wanteds/Basriel_Nix_2.jpg",
            'person_id' => "basrielnix"
        ]);
        
        // Clayton Moore, Le Doc
        DB::table('photos')->insert([
            'id' => "claytonmoore_2",
            'src' => "/storage/pictures/wanteds/Clayton_Moore_2.jpg",
            'person_id' => "claytonmoore"
        ]);
        DB::table('photos')->insert([
            'id' => "claytonmoore_3",
            'src' => "/storage/pictures/wanteds/Clayton_Moore_3.jpg",
            'person_id' => "claytonmoore"
        ]);
        
        // Clayton Moore, Le Doc
        DB::table('photos')->updateOrInsert(
            ['id' => "hommemasque_1"],
            [
                'src' => "/storage/pictures/wanteds/Masque.jpg",
                'person_id' => "hommemasque"
            ]
        );
    }

    private function seed_handmade_featured_photo()
    {
        include 'handmade\People.php';
        
        $agents = array_merge($office_bosses, $hunters);

        $types = ['agents', 'vampires', 'warlocks', 'werewolves', 'wanteds'];

        foreach ($types as $type) {
            foreach (${$type} as $person) {
                $src = "/storage/pictures/".$type."/";
                if ($person['first_name'] != '' && $person['last_name'] != '') {
                    $src = $src.$person['first_name']."_".$person['last_name'];
                } else if ($person['last_name'] == '') {
                    $src = $src.$person['first_name'];
                } else if ($person['first_name'] == '') {
                    $src = $src.$person['last_name'];
                }
                $src = $src."_1.jpg";
                DB::table('photos')->insert([
                    'id' => $person['id']."_1",
                    'src' => $src,
                    'person_id' => $person['id']
                ]);
            }
        }
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed_handmade_featured_photo();
        $this->seed_wanteds();
    }
}
