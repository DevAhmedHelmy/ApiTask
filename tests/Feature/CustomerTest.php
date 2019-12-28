<?php

namespace Tests\Feature;

use App\User;
use App\Customer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    use WithFaker, RefreshDatabase;
     /** @test */
    public function only_admin_can_create_customer()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
           $customer=[
            'user_id' => 1,
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' =>$this->faker->phoneNumber ,
            'address' =>$this->faker->address ,
            'type' =>  $this->faker->randomElement(['individual', 'corporate'])];


            $response = $this->actingAs($user, 'api')->json('POST', 'api/customers',$customer);
            $response->assertStatus(200)
             ->assertJson($customer);
    }
    /** @test */
    public function only_admin_can_update_customer()
    {
        // $this->withoutExceptionHandling();
        $customer = factory(Customer::class)->create();
           
        
            
            $response = $this->actingAs($customer->user, 'api')->put(route('customers.update',['customer'=>$customer->id]),$attributes=[
                'user_id' => 1,
                'name' => "chanaged",
                'email' => "chanaged",
                'phone' =>"chanaged" ,
                'address' =>"chanaged" ,
                'type' =>  "chanaged"]);
            
            $response->assertStatus(200)
             ->assertJson($customer);
    }
}
