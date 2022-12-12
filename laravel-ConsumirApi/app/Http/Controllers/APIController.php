<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    function getPhotosFromAPI() {
        $photos = HTTP::get('https://jsonplaceholder.typicode.com/albums/1/photos');
        $photosArray = $photos->json();

        return view('main', compact('photosArray'));
    }
}