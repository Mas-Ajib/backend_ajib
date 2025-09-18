<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    public function test_api_routes_are_accessible_without_auth(): void
    {
        $response = $this->get('/api/jenis-pegawais');
        $response->assertStatus(200);

        $response = $this->get('/api/agamas');
        $response->assertStatus(200);

        $response = $this->get('/api/status-pegawais');
        $response->assertStatus(200);
    }
}