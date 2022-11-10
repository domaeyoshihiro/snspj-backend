<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class RestControllerTest extends TestCase
{
use RefreshDatabase;

public function test_store_rest()
{
$data = [
'content' => 'test',
'user_id' => '1',
];
$response = $this->post('/api/post', $data);
$response->assertStatus(201);
$response->assertJsonFragment($data);
$this->assertDatabaseHas('posts', $data);
}
}