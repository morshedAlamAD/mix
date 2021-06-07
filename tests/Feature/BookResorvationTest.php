<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Books;
use Tests\TestCase;

class BookResorvationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_book_can_be_added_to_the_library(){

        $this->withoutExceptionHandling();
       $response= $this->post('/books',[
            'title'=>'Cool Book Title',
            'author'=>'Adnan',

        ]);
        $response->assertOk();
        $this->assertCount(1, Books::all());
    }
     public function test_a_basic_request()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

}
