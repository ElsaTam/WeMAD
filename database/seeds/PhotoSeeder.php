<?php

use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    private function seed_wanteds()
    {
        // Otto
        DB::table('photos')->insert([
            'id' => "otto_1",
            'src' => "/storage/pictures/wanted/Otto.webp",
            'person_id' => "otto"
        ]);
        
        // Basriel Nix
        DB::table('photos')->insert([
            'id' => "basrielnix_1",
            'src' => "/storage/pictures/wanted/Basriel_Nix.jpg",
            'person_id' => "basrielnix"
        ]);
        DB::table('photos')->insert([
            'id' => "basrielnix_2",
            'src' => "/storage/pictures/wanted/Basriel_Nix_2.jpg",
            'person_id' => "basrielnix"
        ]);
        
        // Clayton Moore, Le Doc
        DB::table('photos')->insert([
            'id' => "claytonmoore_1",
            'src' => "/storage/pictures/wanted/Clayton_Moore.jpg",
            'person_id' => "claytonmoore"
        ]);
        DB::table('photos')->insert([
            'id' => "claytonmoore_2",
            'src' => "/storage/pictures/wanted/Clayton_Moore_2.jpg",
            'person_id' => "claytonmoore"
        ]);
        DB::table('photos')->insert([
            'id' => "claytonmoore_3",
            'src' => "/storage/pictures/wanted/Clayton_Moore_3.jpg",
            'person_id' => "claytonmoore"
        ]);
        
        // Clayton Moore, Le Doc
        DB::table('photos')->insert([
            'id' => "hommemasque_1",
            'src' => "/storage/pictures/wanted/Masque.jpg",
            'person_id' => "hommemasque"
        ]);
    }

    private function seed_agents()
    {
        
    }

    private function seed_werewolves()
    {
        // Garrett Stafford
        DB::table('photos')->insert([
            'id' => "garrettstafford_1",
            'src' => "/storage/pictures/werewolves/Garrett_Stafford_1.jpg",
            'person_id' => "garrettstafford"
        ]);

        // Micah Fuchs
        DB::table('photos')->insert([
            'id' => "micahfuchs_1",
            'src' => "/storage/pictures/wanted/Micah_Fuchs_1.jpg",
            'person_id' => "micahfuchs"
        ]);

        // Micah Fuchs
        DB::table('photos')->insert([
            'id' => "micahfuchs_2",
            'src' => "/storage/pictures/wanted/Micah_Fuchs_2.jpg",
            'person_id' => "micahfuchs"
        ]);

        // Micah Fuchs
        DB::table('photos')->insert([
            'id' => "micahfuchs_3",
            'src' => "/storage/pictures/wanted/Micah_Fuchs_3.jpg",
            'person_id' => "micahfuchs"
        ]);

        // Leslie Lohflower
        DB::table('photos')->insert([
            'id' => "leslielohflower_1",
            'src' => "/storage/pictures/wanted/Leslie_Lohflower_1.jpg",
            'person_id' => "leslielohflower"
        ]);

        // Jordan Yeriva
        DB::table('photos')->insert([
            'id' => "jordanyeriva_1",
            'src' => "/storage/pictures/werewolves/Jordan_Yeriva_1.jpg",
            'person_id' => "jordanyeriva"
        ]);

        // Roy Turner
        DB::table('photos')->insert([
            'id' => "royturner_1",
            'src' => "/storage/pictures/werewolves/Roy_Turner_1.png",
            'person_id' => "royturner"
        ]);

        // Zoe Chapman
        DB::table('photos')->insert([
            'id' => "zoechapman_1",
            'src' => "/storage/pictures/werewolves/Zoe_Chapman_1.jpg",
            'person_id' => "zoechapman"
        ]);

        // Jackson Cox
        DB::table('photos')->insert([
            'id' => "jacksoncox_1",
            'src' => "/storage/pictures/werewolves/Jackson_Cox_1.jpg",
            'person_id' => "jacksoncox"
        ]);

        // Allie Hooper
        DB::table('photos')->insert([
            'id' => "alliehooper_1",
            'src' => "/storage/pictures/werewolves/Allie_Hooper_1.jpg",
            'person_id' => "alliehooper"
        ]);

        // Anthony Hooper
        DB::table('photos')->insert([
            'id' => "anthonyhooper_1",
            'src' => "/storage/pictures/werewolves/Anthony_Hooper_1.png",
            'person_id' => "anthonyhooper"
        ]);

        // Bess Odell
        DB::table('photos')->insert([
            'id' => "bessodell_1",
            'src' => "/storage/pictures/werewolves/Bess_Odell_1.jpeg",
            'person_id' => "bessodell"
        ]);

        // Kendrick Tendor
        DB::table('photos')->insert([
            'id' => "kendricktendor_1",
            'src' => "/storage/pictures/werewolves/Kendrick_Tendor_1.jpg",
            'person_id' => "kendricktendor"
        ]);

        // Lucille Dotson
        DB::table('photos')->insert([
            'id' => "lucilledotson_1",
            'src' => "/storage/pictures/werewolves/Lucille_Dotson_1.jpg",
            'person_id' => "lucilledotson"
        ]);

        // Nora Gibbons
        DB::table('photos')->insert([
            'id' => "noragibbons_1",
            'src' => "/storage/pictures/werewolves/Nora_Gibbons_1.jpg",
            'person_id' => "noragibbons"
        ]);

        // Ozzy Wade
        DB::table('photos')->insert([
            'id' => "ozzywade_1",
            'src' => "/storage/pictures/werewolves/Ozzy_Wade_1.jpg",
            'person_id' => "ozzywade"
        ]);

        // Victor Mooney
        DB::table('photos')->insert([
            'id' => "victormooney_1",
            'src' => "/storage/pictures/werewolves/Victor_Mooney_1.jpg",
            'person_id' => "victormooney"
        ]);

        // Declan Samson
        DB::table('photos')->insert([
            'id' => "declansamson_1",
            'src' => "/storage/pictures/werewolves/Declan_Samson_1.jpg",
            'person_id' => "declansamson"
        ]);
    }

    private function seed_vampires()
    {
        // Caleb Magnar
        DB::table('photos')->insert([
            'id' => "calebmagnar_1",
            'src' => "/storage/pictures/vampires/Caleb_Magnar_1.jpg",
            'person_id' => "calebmagnar"
        ]);
        
        // Celosia
        DB::table('photos')->insert([
            'id' => "celosia_1",
            'src' => "/storage/pictures/vampires/Celosia_1.jpg",
            'person_id' => "celosia"
        ]);
        
        // Vernon Langley
        DB::table('photos')->insert([
            'id' => "vernonlangley_1",
            'src' => "/storage/pictures/vampires/Vernon_Langley_1.jpg",
            'person_id' => "vernonlangley"
        ]);

        // William Adan
        DB::table('photos')->insert([
            'id' => "williamadan_1",
            'src' => "/storage/pictures/vampires/William_Adan_1.jpg",
            'person_id' => "williamadan"
        ]);

        // Abby Cordwell
        DB::table('photos')->insert([
            'id' => "abbycordwell_1",
            'src' => "/storage/pictures/vampires/Abby_Cordwell_1.png",
            'person_id' => "abbycordwell"
        ]);

        // Birdie Tate
        DB::table('photos')->insert([
            'id' => "birdietate_1",
            'src' => "/storage/pictures/vampires/Birdie_Tate_1.jpg",
            'person_id' => "birdietate"
        ]);

        // Calvin Beck
        DB::table('photos')->insert([
            'id' => "calvinbeck_1",
            'src' => "/storage/pictures/vampires/Calvin_Beck_1.jpg",
            'person_id' => "calvinbeck"
        ]);

        // Charles Gates
        DB::table('photos')->insert([
            'id' => "charlesgates_1",
            'src' => "/storage/pictures/vampires/Charles_Gates_1.png",
            'person_id' => "charlesgates"
        ]);

        // Estella Stout
        DB::table('photos')->insert([
            'id' => "estellastout_1",
            'src' => "/storage/pictures/vampires/Estella_Stout_1.jpg",
            'person_id' => "estellastout"
        ]);

        // Leonardo Pezziali
        DB::table('photos')->insert([
            'id' => "leonardopezziali_1",
            'src' => "/storage/pictures/vampires/Leonardo_Pezziali_1.jpg",
            'person_id' => "leonardopezziali"
        ]);

        // Martin Clayton
        DB::table('photos')->insert([
            'id' => "martinclayton_1",
            'src' => "/storage/pictures/vampires/Martin_Clayton_1.jpg",
            'person_id' => "martinclayton"
        ]);

        // Maud Griffith
        DB::table('photos')->insert([
            'id' => "maudgriffith_1",
            'src' => "/storage/pictures/vampires/Maud_Griffith_1.jpg",
            'person_id' => "maudgriffith"
        ]);

        // Margaret Lowery
        DB::table('photos')->insert([
            'id' => "margaretlowery_1",
            'src' => "/storage/pictures/vampires/Margaret_Lowery_1.jpg",
            'person_id' => "margaretlowery"
        ]);
    }

    private function seed_warlocks()
    {
        // River Lee
        DB::table('photos')->insert([
            'id' => "riverlee_1",
            'src' => "/storage/pictures/warlocks/River_Lee_1.jpg",
            'person_id' => "riverlee"
        ]);

        // Aden McGuire
        DB::table('photos')->insert([
            'id' => "adenmcguire_1",
            'src' => "/storage/pictures/warlocks/Aden_McGuire_1.jpg",
            'person_id' => "adenmcguire"
        ]);

        // Aden McGuire
        DB::table('photos')->insert([
            'id' => "adenmcguire_2",
            'src' => "/storage/pictures/warlocks/Aden_McGuire_2.png",
            'person_id' => "adenmcguire"
        ]);

        // Corey Hunt
        DB::table('photos')->insert([
            'id' => "coreyhunt_1",
            'src' => "/storage/pictures/warlocks/Corey_Hunt_1.png",
            'person_id' => "coreyhunt"
        ]);

        // Sharon Kennedy
        DB::table('photos')->insert([
            'id' => "sharonkennedy_1",
            'src' => "/storage/pictures/warlocks/Sharon_Kennedy_1.png",
            'person_id' => "sharonkennedy"
        ]);

        // Kharak Roshan
        DB::table('photos')->insert([
            'id' => "kharakroshan_1",
            'src' => "/storage/pictures/warlocks/Kharak_Roshan_1.jpg",
            'person_id' => "kharakroshan"
        ]);

        // Dagan Devante
        DB::table('photos')->insert([
            'id' => "dagandevante_1",
            'src' => "/storage/pictures/warlocks/Dagan_Devante_1.jpg",
            'person_id' => "dagandevante"
        ]);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed_wanteds();
        $this->seed_agents();
        $this->seed_werewolves();
        $this->seed_vampires();
        $this->seed_warlocks();
    }
}
