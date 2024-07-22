<?php
    namespace App\Services;

    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\Config;

    class OpenBreweryService {

        public string $baseuri; 
        
        public function __construct(){
            $this->baseuri = Config::get('openbrewery.baseuri' );
        }


        public function getAllBeers(){
            return Http::get( $this->baseuri . Config::get( 'openbrewery.endpoints.allBeers.uri') );
        }
    }