<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{
	use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_invalid_username()
    {
    	User::create([
    		'iqama' => '1111',
    		'name' => 'Test Only',
    		'password_expires_at' => Carbon::now()->addDay(30),
    		'email' => 'test@yahoo.com',
    		'password' => Hash::make('password'),
    	]);

    	$this->assertCount(1, User::all());
    	
    	$username = 'sample@ahoo.com';
    	$password = 'password';

    	$response = $this->from('login')->post('login', [
        	'email' => $username,
        	'password' => $password
        ]);    

    	$this->assertGuest();
    	$this->assertInvalidCredentials(['email' => $username, 'password' => $password]);
        $response->assertSessionHasErrors('email', 'These credentials do not match our records.');            
        $response->assertRedirect('/login');            
    }
}
