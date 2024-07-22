<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OpenBreweryApiTest extends TestCase
{
    /**
     * Test per verificare che l'api risponda 200 con success = false in caso di mancanza del token
     */
    public function test_brewery_response_ko(): void
    {
        $response = $this->get('/api/brewery/beers');
        $response->assertStatus(200);
        $this->assertFalse( $response->original->success );
    }

}
