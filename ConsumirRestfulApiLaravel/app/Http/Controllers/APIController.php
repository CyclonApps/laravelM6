<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    function savePeopleFromApiToDB() {
        // https://swapi.dev/api/people/?page=1&format=json
        // Recuperem de 10 en 10 els personatges i els guardem a la base de dades
        for ($i = 1; $i < 10; $i++) {

            // Recuperar personatges
            $people = HTTP::get("https://swapi.dev/api/people/?page=" . $i . "&format=json");
            $peopleArray = $people->json();

            // Guardar personatges
            foreach($peopleArray['results'] as $elem) {
                // Guardar a la base de dades
                People::create([
                    'nom' => $elem['name'],
                    'alcada' => $elem['height'],
                    'pes' => $elem['mass'],
                    'colorCabell' => $elem['hair_color'],
                    'colorPell' => $elem['skin_color'],
                    'colorUlls' => $elem['eye_color'],
                    'anyNaixement' => $elem['birth_year'],
                    'genere' => $elem['gender']
                ]);
            }
        }
    }

    function getbd() {

    }
}
