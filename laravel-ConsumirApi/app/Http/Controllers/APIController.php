<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Photo;

class APIController extends Controller
{
    function getPhotosFromAPI() {
        $photos = HTTP::get('https://jsonplaceholder.typicode.com/albums/1/photos');
        $photosArray = $photos->json();

        return view('main', compact('photosArray'));
    }

    function saveDataFromAPI() {
        $photos = HTTP::get('https://jsonplaceholder.typicode.com/photos');
        $photosArray = $photos->json();

        foreach($photosArray as $elem) {
            Photo::create([
                'title' => $elem['title'],
                'url' => $elem['url']
            ]);
        }

        return "Dades carregades a la BD";
    }
}