<?php

namespace Yab\Mint\Tests;

use Yab\Mint\Tests\TestCase;
use Yab\Mint\Tests\Models\CastableModel;

class MoneyCastTest extends TestCase
{
    /** @test */
    public function monetary_values_are_stored_in_cents_and_retrieved_in_dollars()
    {
        $model = CastableModel::create([
            'amount' => 39.95,
        ]);

        $this->assertDatabaseHas('castable_models', [
            'id' => $model->id,
            'amount' => 3995
        ]);

        $model = $model->fresh();

        $this->assertEquals(39.95, $model->amount);
    }
}
