<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GameTest extends TestCase
{
    use RefreshDatabase;

    /**
     @test
     */
    public function client_can_create_a_new_game()
    {
        $this->withoutExceptionHandling();
        $rows = 5;
        $cols = 5;
        $mines = 5;
        $cells = $rows * $cols;
        $data = [
            'mines' => $mines,
            'rows' => $rows,
            'cols' => $cols
        ];
        $response = $this->postJson('/api/game/create', $data);
        $response
            ->assertStatus(201)
            ->assertJsonPath('mines', $data['mines'])
            ->assertJsonFragment($data);
    }
    /**
     @test
     */
    public function client_can_create_and_load_a_new_game()
    {
        $this->withoutExceptionHandling();
        $rows = 5;
        $cols = 5;
        $mines = 5;
        //$cells = $rows * $cols;
        $data = [
            'mines' => $mines,
            'rows' => $rows,
            'cols' => $cols
        ];
        $response = $this->postJson('/api/game/create-n-load', $data);
        $response
            ->assertStatus(200)
            ->assertJsonPath('game.mines', $data['mines'])
            ->assertJsonFragment($data);
        /* ->assertJsonCount( //DEV
                $cells,
                'game.cells'
            );*/
    }

    /** @test */
    public function new_game_requires_rows()
    {
        $data = [
            'mines' => 5,
            'cols' => 5
        ];
        $response = $this->postJson('/api/game/create', $data);
        $response->assertStatus(500);
    }

    /** @test */
    public function new_game_requires_cols()
    {
        $data = [
            'mines' => 5,
            'rows' => 5
        ];
        $response = $this->postJson('/api/game/create', $data);
        $response->assertStatus(500);
    }

    /** @test */
    public function new_game_requires_mines()
    {
        $data = [
            'rows' => 5,
            'cols' => 5
        ];
        $response = $this->postJson('/api/game/create', $data);
        $response->assertStatus(500);
    }
}
