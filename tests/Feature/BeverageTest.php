<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Beverage;
use App\User;

class BeverageTest extends TestCase
{
    use DatabaseMigrations;


    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    //TDD - Test driven Development

    public function user_can_visit_beverage_page_and_see_beverages()
    {
        $beverage = factory(Beverage::class)->create();
        //go to url
        $response = $this->get('beverage');
        //assert beverage name
        $response->assertSee($beverage->name);
        //assert status
        $response->assertStatus(200);
    }

    /** @test */
    public function user_can_visit_single_beverage_page()
    {
        $this->authenticate(); //ensures that user is authenticated 

        $beverage = factory(Beverage::class)->create();
        $response = $this->get('/beverage/'. $beverage->id);
        //assert beverage name
        $response->assertSee($beverage->name);

        $response->assertStatus(200);

    }

    /** @test */
    public function logged_in_user_can_buy_beverage()
    {
        //logged in user
        // $this->authenticate();

        $user = factory(User::class)->make();
        $this->actingAs($user);  //actingAs method may be used to specify the currently authenticated user as well as its scopes.

        /**
         *knowing that this Beverage class, extends TestCase, we can decide to
         *authentication logic in the TestCase.php and inherit it thus:
         *    $this->authenticate();
         * this can be used instead of the two line logic above
         */

        //post a data for buying
        $beverage = factory(Beverage::class)->create();

        $data = [
            'beverage_id' => $beverage->id,
            'price' => 200,
        ];

        $response = $this->post('/beverage/buy', $data);
        //assert in database
        $this->assertDatabaseHas('purchases',$data); //assertDatabaseHas() accepts database name and data

        //status
        $response->assertStatus(201);


    }



}



// to get exact exception error, go to report function on the App\Exception\Handler.php
//and add this:

    // if(app()->environment() == 'testing' )
    // {
    //     throw $exception;
    // }







