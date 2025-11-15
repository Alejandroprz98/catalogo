<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            [
                'title' => 'Iron Man',
                'synopsis' => 'Tony Stark construye un traje de alta tecnología para convertirse en Iron Man.',
                'year' => 2008,
                'cover' => 'ironman.jpg',
            ],
            [
                'title' => 'The Incredible Hulk',
                'synopsis' => 'Bruce Banner se convierte en Hulk tras un experimento fallido.',
                'year' => 2008,
                'cover' => 'hulk.jpg',
            ],
            [
                'title' => 'Thor',
                'synopsis' => 'El dios del trueno es desterrado a la Tierra y debe probar su valor.',
                'year' => 2011,
                'cover' => 'thor.jpg',
            ],
            [
                'title' => 'Captain America: The First Avenger',
                'synopsis' => 'Steve Rogers se convierte en el supersoldado Capitán América.',
                'year' => 2011,
                'cover' => 'captainamerica1.jpg',
            ],
            [
                'title' => 'The Avengers',
                'synopsis' => 'Los héroes más poderosos de la Tierra se unen para detener a Loki.',
                'year' => 2012,
                'cover' => 'avengers.jpg',
            ],
            [
                'title' => 'Guardians of the Galaxy',
                'synopsis' => 'Un grupo de inadaptados se une para salvar la galaxia.',
                'year' => 2014,
                'cover' => 'guardians.jpg',
            ],
            [
                'title' => 'Doctor Strange',
                'synopsis' => 'Un neurocirujano aprende las artes místicas para proteger al mundo.',
                'year' => 2016,
                'cover' => 'doctorstrange.jpg',
            ],
            [
                'title' => 'Black Panther',
                'synopsis' => 'T’Challa se convierte en rey de Wakanda y enfrenta nuevos desafíos.',
                'year' => 2018,
                'cover' => 'blackpanther.jpg',
            ],
            [
                'title' => 'Avengers: Infinity War',
                'synopsis' => 'Los Vengadores luchan contra Thanos para detener la recolección de las Gemas del Infinito.',
                'year' => 2018,
                'cover' => 'infinitywar.jpg',
            ],
            [
                'title' => 'Avengers: Endgame',
                'synopsis' => 'Los Vengadores restantes viajan en el tiempo para revertir el chasquido de Thanos.',
                'year' => 2019,
                'cover' => 'endgame.jpg',
            ],
        ]);
    }
}
