<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Supplier;
use App\User;

class SupplierTest extends TestCase
{
	use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_can_add_new()
    {
    	$this->withoutExceptionHandling();

    	$user = factory(User::class)->create();

        $response = $this->actingAs($user)
			->post('/suppliers', [
	    		'code' => '2000',
	    		'name' => 'Abulatif Jameel',
	    		'type' => 'credit'
    	]);

		$response->assertRedirect('/suppliers');
		$this->assertCount(1, Supplier::all());
        $this->assertEquals('2000', Supplier::first()->code);
        $this->assertEquals('Abulatif Jameel', Supplier::first()->name);
        $this->assertEquals('credit', Supplier::first()->type);    	
	}
}
