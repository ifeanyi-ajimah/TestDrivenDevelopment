<?php

namespace Tests\Unit;

use App\Beverage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BeverageTest extends TestCase
{

    // use DatabaseTransactions;  // rolls back and delete only data

    use DatabaseMigrations; //rollback  and delete the entire database table . thereby deleting the table after the test.

    private $beverage;




    // public function setup()
    // {
    //     parent::setup();
    //     $this->beverage = factory(Beverage::class)->make();
    // }

    /** @test */

    public function beverage_has_name()
    {
        //create beverage
        $beverage = factory(Beverage::class)->make();
        $name = $beverage->name;

        //assert
        $this->assertNotEmpty($name);
    }


    /** @test */

    // public function beverage_has_type()
    // {
    //             //create beverage
    //             // $beverage = factory(Beverage::class)->make();
    //             // $type = $beverage->type;
    //             //assert
    //     $this->assertNotEmpty($this->beverage->type);
    // }

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


    