<?php
    namespace App\Models\Api;

    /**
     * Busta di ritorno per evitare inconvienti nella gestione degli errori fatali
     */
    class Response {
        public bool $success;
        public int $code;
        public string $message;
        public $data;

        public function __construct( $success , $code , $message , $data ) {
            $this->success = $success;
            $this->code = $code;
            $this->message = $message;
            $this->data = $data;
        }

        public static function createSuccess( $data , $message = 'OK') {
            return new self( true , 200 , $message , $data );
        }

        public static function createFailure( $data = null, $code = 500, $message = 'KO') {
            return new self( false, $code , $message, $data );
        }
    }