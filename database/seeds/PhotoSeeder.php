<?php

use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    private function insert_photo(string $id, string $name, $n_photo)
    {
        $name = str_replace(' ', '_', $name);
        for ($i = 2; $i < $n_photo+2; ++$i)
        {
            DB::table('photos')->insert([
                'id' => $id."_".($i),
                'src' => "/storage/pictures/wanteds/".$name."_".($i).".jpg",
                'person_id' => $id
            ]);
        }
    }

    private function seed_wanteds()
    {
        $this->insert_photo("basrielnix", "Basriel Nix", 1);
        $this->insert_photo("claytonmoore", "Clayton Moore", 2);
        $this->insert_photo("curtislevesque", "Curtis Levesque", 2);
        $this->insert_photo("aldocaballero", "Aldo Caballero", 1);
        $this->insert_photo("lazarethornton", "Lazare Thornton", 2);
        $this->insert_photo("stevenmaher", "Steven Maher", 2);
        $this->insert_photo("herschelmayer", "Herschel Mayer", 2);
        $this->insert_photo("melonyweatherford", "Melony Weatherford", 2);
        $this->insert_photo("velvetjanssen", "Velvet Janssen", 2);
        
        // L'homme Masqué
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
        include 'handmade/People.php';
        
        $agents = array_merge($office_bosses, $hunters);

        $types = ['agents', 'vampires', 'warlocks', 'werewolves', 'wanteds'];

        foreach ($types as $type) {
            foreach (${$type} as $person) {
                $ai = "";
                if ($type == "agents") $ai = "ai_";
                $src = "/storage/pictures/".$ai.$type."/";
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
