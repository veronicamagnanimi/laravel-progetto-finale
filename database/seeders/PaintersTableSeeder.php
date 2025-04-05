<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Painter;

class PaintersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $painters = [
            [
                "name" => "Vincent Van Gogh", 
                "description" => "Van Gogh credeva fermamente che l'arte dovesse esprimere la propria visione interiore, spesso tormentata,
                attraverso colori intensi e pennellate energiche."
            ],
            [
               "name" => "Evard Munch",
               "description" => "Munch, attraverso i suoi dipinti, ha cercato di rappresentare la solitudine e la sofferenza umana,
               esplorando emozioni profonde."
            ],
            [
                "name" => "Gustav Klimt",
                "description" => "Klimt vedeva l'arte come una forma di esplorazione della condizione umana, fondendo il sensualismo
                con il simbolismo per creare opere che esprimessero l'intensità della vita."
            ],
            [
                "name" => "Pablo Picasso",
                "description" => "Picasso esprimeva l'idea che la creatività e la spontaneità dell'infanzia dovrebbero essere
                conservate anche nell'età adulta, rendendo l'arte una forma di espressione pura."
            ],
            [
                "name" => "Leonardo Da Vinci",
                "description" => "Leonardo vedeva la pittura come una lingua universale, in grado di esprimere concetti
                ed emozioni che vanno oltre le parole, una fusione tra scienza e arte."
            ],
            [
                "name" => "Salvador Dalì",
                "description" => "Dalì esprimeva un'affermazione ironica sulla perfezione, sapendo che l'arte non è mai statica
                e che il suo lavoro sarebbe stato sempre in continua evoluzione."
            ],
            [
                "name" => "Caravaggio",
                "description" => "Caravaggio ha rotto con le convenzioni artistiche del suo tempo, creando opere che sfidavano la tradizione
                e mettevano in evidenza la realtà cruda della vita quotidiana."
            ],
            [
                "name" => "Amedeo Modigliani",
                "description" => "Noto per i suoi ritratti di figure dai volti allungati e dagli occhi spesso privi di pupille, 
                Modigliani dichiarava: 'Dipingerò i tuoi occhi quando conoscerò la tua anima'."
            ]
            ];

            foreach ($painters as $painter) {
                $newPainter = new Painter();

                $newPainter->name = $painter['name'];
                $newPainter->description = $painter['description'];
                
                $newPainter->save();
            };
    }
}
