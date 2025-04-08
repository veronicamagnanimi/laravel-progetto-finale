<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Work;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $works = [
            [
                "name" => "La notte stellata",
                "painter" => "Vincent Van Gogh",
                "year" => 1889,
                "location" => "Museum of Modern Art, New York",
                "description" => "La celebre opera di Van Gogh cattura un cielo notturno turbolento e vibrante di colori, con spirali e stelle
                che sembrano danzare sopra un paesaggio tranquillo. L'intensità del suo tratto e dei colori esprime il suo tormento interiore.",
                "image" => "images/lanottestellata.jpg"
            ],
            [
                "name" => "I Girasoli",
                "painter" => "Vincent Van Gogh",
                "year" => 1888,
                "location" => "Van Gogh Museum, Amsterdam",
                "description" => "Con quest'opera, Van Gogh ha trasformato un semplice soggetto naturale in una celebrazione della vita.
                I suoi girasoli sono diventati simbolo di calore, vitalità e speranza, un tema ricorrente nelle sue opere più celebri."
            ],
            [
                "name" => "L'Urlo",
                "painter" => "Edvard Munch",
                "year" => 1893,
                "location" => "National Gallery, Oslo",
                "description" => "Quest'opera è un grido universale di angoscia, solitudine e alienazione. Con il suo uso espressionista
                del colore e delle linee, Munch cattura l'inquietudine psicologica, immortalando un momento di totale disperazione."
            ],
            [
                "name" => "Il Bacio",
                "painter" => "Gustav Klimt",
                "year" => 1908,
                "location" => "Belvedere, Vienna",
                "description" => "Una delle opere più famose di Klimt, rappresenta l'amore come un'armonia di colori dorati e ornamenti,
                fondendo simbolismo e arte decorativa. I due amati sono avvolti in un abbraccio intimo, simbolo di intimità."
            ],
            [
                "name" => "Guernica",
                "painter" => "Pablo Picasso",
                "year" => 1937,
                "location" => "Museo Reina Sofia, Madrid",
                "description" => "Guernica è uno dei più potenti e toccanti dipinti di protesta contro la guerra. Realizzato da Picasso
                durante la guerra civile spagnola, l'opera esprime il caos e la sofferenza causata dai bombardamenti sulla città"
            ],
            [
                "name" => "La Gioconda",
                "painter" => "Leonardo Da Vinci",
                "year" => 1503,
                "location" => "Museo del Louvre, Parigi",
                "description" => "La Gioconda è uno dei dipinti più celebri al mondo, noto per il suo enigmatico sorriso e la tecnica
                dello sfumato, che conferisce profondità e realismo al ritratto."
            ],
            [
                "name" => "L'Ultima Cena",
                "painter" => "Leonardo Da Vinci",
                "year" => 1498,
                "location" => "Convento di Santa Maria delle Grazie, Milano",
                "description" => "Quest'opera rappresenta l'Ultima Cena di Gesù con i suoi discepoli, catturando il momento in cui annuncia
                che uno di loro lo tradirà. È un capolavoro di composizione e prospettiva."
            ],
            [
                "name" => "La persistenza della memoria",
                "painter" => "Salvador Dalì",
                "year" => 1931,
                "location" => "Museum of Modern Art, New York",
                "description" => "Quest'opera surrealista è famosa per i suoi orologi molli, che rappresentano la relatività del tempo
                e la fragilità della realtà. È uno dei simboli più iconici del surrealismo."
            ],
            [
                "name" => "Scudo con testa di Medusa",
                "painter" => "Caravaggio",
                "year" => 1597,
                "location" => "Galleria degli Uffizi, Firenze",
                "description" => "Caravaggio dipinse la testa di Medusa su uno scudo, catturando il momento in cui la creatura mitologica
                viene decapitata da Perseo. L'opera è un esempio della sua maestria nel chiaroscuro."
            ],
            [
                "name" => "Narciso",
                "painter" => "Caravaggio",
                "year" => 1599,
                "location" => "Galleria Nazionale d'Arte Antica, Roma",
                "description" => "Quest'opera raffigura il mito di Narciso, il giovane che si innamora della propria immagine riflessa
                nell'acqua. Caravaggio utilizza il chiaroscuro per creare un'atmosfera drammatica."
            ],
            [
                "name" => "Jeanne Hébuterne con cappello",
                "painter" => "Amedeo Modigliani",
                "year" => 1918,
                "location" => "Collezione privata",
                "description" => "Un ritratto della compagna di Modigliani, Jeanne Hébuterne, caratterizzato dai tratti distintivi
                dell'artista: volti allungati, occhi enigmatici e un'eleganza senza tempo."
            ]
        ];

        foreach ($works as $work) {
            // cerca il pittore nella tabella 'painters' utilizzando il nome specificato nel record corrente
            $painter = \App\Models\Painter::where('name', $work['painter'])->first();

            if ($painter) {
                $newWork = new Work();

                $newWork->name = $work['name'];
                $newWork->painter_id = $painter->id; // id del pittore associato
                $newWork->year = $work['year'];
                $newWork->location = $work['location'];
                $newWork->description = $work['description'];

                $newWork->save();
            }
        }

    }
}
