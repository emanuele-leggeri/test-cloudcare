<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenBreweryService;

class PagesController extends Controller
{
    // Impostazione del numero di elementi per pagina di default
    protected $per_page = 10;

    // Impostazione del numero di pagina di default
    protected $page = 1;

    /**
     * Metodo per il display della view che renderizza la lista delle birre
     */
    public function beerList( Request $request ) {
        $service = new OpenBreweryService();
        $beerList = $service->getAllBeers();
        return view( 'pages.beer.list');
    }
}
