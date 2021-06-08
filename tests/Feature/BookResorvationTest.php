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

    public function test_the_title_validation()
    {
        $response= $this->post('/books',[
             'title'=>'',
             'author'=>'Adnan',
         ]);
         $response->assertSessionHasErrors('title');
    }
    /** @test */
    public function the_author_validation()
    {
        $response= $this->post('/books',[
             'title'=>'Cool book title.',
             'author'=>'',
         ]);
         $response->assertSessionHasErrors('author');
    }
    /** @test */
    public function the_post_edit_test()
    {
        $this->withoutExceptionHandling();
        $response= $this->post('/books',[
             'title'=>'Cool book title.',
             'author'=>'adnan',
         ]);
         $book=Books::first();
          $response= $this->patch('/books/'. $book->id,[
             'title'=>'new title',
             'author'=>'new author',
         ]);
         $this->assertEquals('new title', Books::first()->title);
         $this->assertEquals('new author', Books::first()->author);
    }

}
