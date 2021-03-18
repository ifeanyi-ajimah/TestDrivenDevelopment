<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
   // To create a new unit test: php artisan make:test TestName --unit

   
    public function testBasicTest()
    {
        $response = $this->get('/');

        // $response->assertStatus(200);
        // $response->assertSee('Laravel');
        $response->assertSeeInOrder(['Laravel', 'Docs']);
        // $response->dump();
    }

    /** @test */

    public function about_route_return_something()
    {
        $response = $this->get('/about');
        // dd($response);
        // for other assertions, see laravel documentation testing/HTTP Tests
        $response->assertSee('About');

        // $response->assertStatus(200);
        $response->dump();//dump what the response is

    }



}
