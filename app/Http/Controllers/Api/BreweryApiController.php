<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Api\Response;
use App\Services\OpenBreweryService as OpenBrewery;

class BreweryApiController extends ApiController
{
    /**
     * Metodo per ricevere la lista delle birre dal servizio esterno
     * @return Array
     */
    public function getAllBeers( Request $request )  {
        $service = new OpenBrewery();
        $per_page = $request->input('per_page') ?? 10;
        $page = $request->query('page') ?? 1;

        $allBeers = $service->getAllBeers()->json();

        $sliceto = $page * $per_page;

        $beers = array_slice( $allBeers, $sliceto, $per_page);

        return $beers;
    }
}
