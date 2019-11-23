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

    public function test_valid_credentials()
    {
        $username = 'sample@ahoo.com';
        $password = 'password';

        User::create([
            'iqama' => '1111',
            'name' => 'Test Only',
            'password_expires_at' => Carbon::now()->addDay(30),
            'email' => $username,
            'password' => Hash::make($password),
        ]);

        $this->assertCount(1, User::all());
        
        $response = $this->from('login')->post('login', [
            'email' => $username,
            'password' => $password
        ]);    

        $user = User::first();

        $this->assertAuthenticated();
        $this->assertAuthenticatedAs($user);
        $this->assertCredentials(['email' => $username, 'password' => $password]);
        $response->assertStatus(302); // means redirected
        $response->assertRedirect('dashboard');            
    }

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

        $response->assertRedirect('login');            
    }

    public function test_username_is_required()
    {
        $username = '';
        $password = 'password';

        $response = $this->from('login')->post('login', [
            'email' => $username,
            'password' => $password
        ]);    

        $this->assertGuest();
        $this->assertInvalidCredentials(['email' => $username, 'password' => $password]);
        $response->assertSessionHasErrors(['email' => 'The email field is required.']);            
        $response->assertRedirect('login');            
    }

    public function test_password_is_required()
    {
        $username = 'sample@ahoo.com';
        $password = '';

        $response = $this->from('login')->post('login', [
            'email' => $username,
            'password' => $password
        ]);    

        $this->assertGuest();
        $this->assertInvalidCredentials(['email' => $username, 'password' => $password]);
        $response->assertSessionHasErrors(['password' => 'The password field is required.']);            
        $response->assertRedirect('login');            
    }

    public function test_password_expiry_scenario()
    {
        $username = 'samplee@ahoo.com';
        $password = 'passwordd';

        $user = new User;
        $user->iqama = '1111';
        $user->name = 'Test Only';
        $user->password_expires_at = Carbon::now()->subDays(1); // expired 1 day ago
        $user->email = $username;
        $user->password = Hash::make($password);
        $user->save();
        
        $this->assertCount(1, User::all());
        
        $response = $this->from('login')->post('login', [
            'email' => $username,
            'password' => $password
        ]);    

        $this->assertGuest();
        $response->assertSessionHasErrors(['error' => 'Password expired']);  
        $response->assertRedirect('login');

        $user->password_expires_at = Carbon::now();
        $user->update();

        $response = $this->from('login')->post('login', [
            'email' => $username,
            'password' => $password
        ]);    

        $this->assertGuest();
        $response->assertSessionHasErrors(['error' => 'Password expired']);  
        $response->assertRedirect('login');            
    
        $user->password_expires_at = Carbon::now()->addDay(1);
        $user->update();

        $response = $this->from('login')->post('login', [
            'email' => $username,
            'password' => $password
        ]);    

        $this->assertAuthenticated();
        $this->assertAuthenticatedAs($user);
        $response->assertStatus(302); // means redirected
        $response->assertRedirect('dashboard');
    }
}
