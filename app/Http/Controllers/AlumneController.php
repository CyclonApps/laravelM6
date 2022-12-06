<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumne;
use App\Models\Centre;

class AlumneController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnes = Alumne::paginate(10);
        return view("alumne", compact("alumnes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $alumne = new Alumne;
    $title = __("Afegir alumne");
    $textButton = __("Afegir");
    $route = route("alumne.store");
    $centres = Centre::all();
    return view("alumne.create", compact("alumne", "title", "textButton", "route", "centres"));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $this->validate($request, [
        "nom" => "required",
        "cognoms" => "required",
        "data_naixement" => "required|date",
        "centre_id" => "required"
    ]);
    Alumne::create($request->all());
    return redirect(route("alumne.index"))
		    ->with("success", __("L'alumne " . $request->nom . " " . $request->cognoms . " s'ha afegit correctament!"));
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
