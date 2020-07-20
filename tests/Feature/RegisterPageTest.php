<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserIsRedirectedWithNoLogin(){
        $response = $this->get('/admin/AdminDashboard');
        $response->assertRedirect(route('login'));
    }

    // public function testNewUserRegistration()
    // {
    //     $user = User::create([
    //         'firstName' => $data['firstName'],
    //         'middleName' => $data['middleName'],
    //         'lastName' => $data['lastName'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'mobile' => $data['mobile'],
    //         'street' =>  $data['street'],
    //         'city' => $data['city']       
    //     ]);

    //         $role = Role::select('id')->where('name' , 'مستخدم')->first();
    //          $user->roles()->attach($role);
    // }
    // public function test_Only_Logged(){
    //     $response = $this->get('/user/personalPage/propertiesPersonal')
    //     ->assertRedirect('/login');   //remove the auth from controller 
    // }
        
}
