<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TokenApiTest extends TestCase
{
    /**
     * Test per verificare l'erogazione del token con le credenziali corrette
     */
    public function test_login_credential_ok(): void
    {
        $response = $this->post('/api/auth/login', [
            'email' => 'emanuele.leggeri@gmail.com',
            'password' => 'password'
        ]);
        $response->assertStatus(200);
        $this->assertTrue( $response->original->success );
    }

    /**
     * Test per verificare che con credenziali errate l'applicativo non fornisca il token
     */
    public function test_login_wrong_credential() {
        $response = $this->post('/api/auth/login', [
            'email' => 'emanuele.leggeri@gmail.com',
            'password' => 'PASSWORDERRATA'
        ]);
        $response->assertStatus(200);
        $this->assertFalse( $response->original->success );
    }
}
