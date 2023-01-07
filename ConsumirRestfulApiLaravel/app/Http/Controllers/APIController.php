<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class APIController extends Controller
{

    function savePeopleFromApiToDB() {
        ini_set('max_execution_time', '300');
        // https://swapi.dev/api/people/?page=1&format=json
        // Recuperem de 10 en 10 els personatges i els guardem a la base de dades
        $url = "https://swapi.dev/api/people/?page=1&format=json";

        while ($url != null) {


            // Recuperar personatges
            $people = HTTP::get($url);
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
                    'genere' => $elem['gender'],
                    'planeta' => Http::get($elem['homeworld'])['name']
                ]);
            }

            $url = $peopleArray['next'];
        }

        if (People::count() > 0) {
            echo "Personatges desats correctament";
            echo "<p><a href='http://localhost:8000'>Tornar</a>";
        } else {
            echo "No s'han afegit els personatges";
            echo "<p><a href='http://localhost:8000'>Tornar</a>";
        }

    }

    function getPeopleFromDB() {
        $people = People::paginate(10);
        return view("people", compact("people"));
    }

    function getPeopleFromApi() {
        ini_set('max_execution_time', '300');
        // https://swapi.dev/api/people/?page=1&format=json
        // Recuperem de 10 en 10 els personatges i els guardem a la base de dades
        ini_set('max_execution_time', 500);
        $url = "https://swapi.dev/api/people/?page=1&format=json";
        $peopleArray = array();

        while ($url != null) {

            // Recuperar personatges
            $peopleJson = json_decode(HTTP::get($url), true);

            $peopleArray = array_merge($peopleArray, $peopleJson['results']);

            $url = $peopleJson['next'];
        }

        //Cambiem les rutes dels planetes pels noms dels planetes
        for($i = 0; $i < count($peopleArray); $i++) {
            $peopleArray[$i]['homeworld'] = Http::get($peopleArray[$i]['homeworld'] . "/?format=json")['name'];
        }

        // Retornem la vista per mostrar els personatges
        if (count($peopleArray) > 0) {
            $people = $this->paginate($peopleArray);
            $people->withPath("/getApiPeople");
            return view ("peopleApi", compact("people"));
        } else {
            echo "Error al recuperar els personatges";
            echo "<p><a href='http://localhost:8000'>Tornar</a>";
        }
    }

    public function paginate($items, $perPage = 10, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage ;
        $itemstoshow = array_slice($items, $offset, $perPage);
        return new LengthAwarePaginator($itemstoshow ,$total ,$perPage);
    }
}
