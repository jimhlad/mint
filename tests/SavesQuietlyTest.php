<?php

namespace Yab\Mint\Tests;

use Illuminate\Support\Facades\Event;
use Yab\Mint\Tests\TestCase;
use Yab\Mint\Tests\Models\EventfulModel;
use Yab\Mint\Tests\Events\EventfulModelSaved;

class SavesQuietlyTest extends TestCase
{
	/** @test */
    public function a_model_can_be_saved_loudly()
    {
    	Event::fake();

    	$model = EventfulModel::make();
    	
    	$model->save();

    	Event::assertDispatched(EventfulModelSaved::class);
    }

    /** @test */
    public function a_model_can_be_saved_quietly()
    {
    	Event::fake();

    	$model = EventfulModel::make();

    	$model->saveQuietly();

    	Event::assertNotDispatched(EventfulModelSaved::class);
    }
}