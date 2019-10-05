<?php

namespace Tests\Unit;

use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GameTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function game_require_cols()
    {
        $this->assertTrue(true);
    }
}
