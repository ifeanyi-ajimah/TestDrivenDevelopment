<?php

namespace Tests\Unit;

use App\Drug;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Exceptions\HardDrugsException;

class DrugTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function a_minor_user_can_not_buy_hard_drugs()
    {
        //hard drugs
        $drugs = factory(Drug::class)->make([
            'name' => 'kosmolo',
            'type' => 'HardDrug'
        ]);

        //minor user

        $user = factory(User::class)->make([
            'age' => '17',
        ]);

        //logged in
        //actingAs method may be used to specify the currently authenticated user as well as its scopes.
        $this->actingAs($user);

        //expect exception
        $this->expectException(HardDrugsException::class);

        //buy drugs
        $drugs->buy();




    }

    /** @test */
    public function user_has_age_attribute()
    {
        //user
        $user = factory(User::class)->make();

        //assert for attribute
        $this->assertNotNull($user->age);
    }

}


//  To use DatabaseMigrations without affecting the database table, ensure to add these below to the phpunit.xml file
//they ll ensure you use sqlite rather and also run in memmory when you test.


// <server name="DB_CONNECTION" value="sqlite"/>
// <server name="DB_DATABASE" value=":memory:"/>


// to get exact exception error, go to report function on the App\Exception\Handler.php
//and add this:

    // if(app()->environment() == 'testing' )
    // {
    //     throw $exception;
    // }

    