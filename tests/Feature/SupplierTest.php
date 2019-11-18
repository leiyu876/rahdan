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

    	$response = $this->actingAs($this->dummyUser())
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

    public function test_cannot_add_new_if_duplicate_code()
    {
        $supplier = factory(Supplier::class)->create();

        $this->assertCount(1, Supplier::all());        

        $response = $this->actingAs($this->dummyUser())
            ->post('/suppliers', [
                'code' => $supplier->code,
                'name' => 'Sample name',
                'type' => 'credit'
            ]);

        $response->assertSessionHas('error', 'Code already exist.');

        $this->assertCount(1, Supplier::all());
    }

    public function test_can_add_new_if_code_is_2000()
    {
        $supplier = factory(Supplier::class)->create();
        $supplier->code = 2000;
        $supplier->update();

        $this->assertCount(1, Supplier::all());        

        $response = $this->actingAs($this->dummyUser())
            ->post('/suppliers', [
                'code' => 2000,
                'name' => 'Sample name',
                'type' => 'credit'
            ]);

        $this->assertCount(2, Supplier::all());
    }

    public function test_code_is_required()
    {
        $response = $this->actingAs($this->dummyUser())
            ->post('/suppliers', [
                'code' => '',
                'name' => 'Michael Jordan',
                'type' => 'credit'
            ]);

        $response->assertSessionHasErrors(['code']);

        $this->assertCount(0, Supplier::all());
    }

    public function test_name_is_required()
    {
        $response = $this->actingAs($this->dummyUser())
            ->post('/suppliers', [
                'code' => '2004',
                'name' => '',
                'type' => 'credit'
            ]);

        $response->assertSessionHasErrors(['name']);

        $this->assertCount(0, Supplier::all());
    }

    private function dummyUser()
    {
        return factory(User::class)->create();
    }
}
