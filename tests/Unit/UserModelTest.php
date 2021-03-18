<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
// N/B:  To create a new unit test: php artisan make:test TestName --unit


class UserModelTest extends TestCase
{
    // use DatabaseTransactions;  // rolls back and delete only data

    use DatabaseMigrations; //rollback  and delete the entire database table . thereby deleting the table after the test.



    /** @test */

    
    public function user_has_full_name_attribute()
    {
        // create user
        $user = User::create(['first_name' => 'Ifeco','last_name' => 'Ajimah', 'email' => 'ajimahifeanyi@gmail.com', 'password'=> 'secret'  ]);

        // assert user has full name
        $this->assertEquals('Ifeco Ajimah', $user->full_name );

        // $this->assertTrue(true);
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




