<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Books;
use Tests\TestCase;
use illuminate\Support\Str;

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
        $book = Books::first();
       $response= $this->post('/books',[
            'title'=>'Cool Book Title',
            'slug'=> Str::slug('title'),
            'author'=>'Adnan',
        ]);
        $this->assertCount(1, Books::all());
        $response->assertRedirect('/books');
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
        $response= $this->post('/books', [
             'title'=>'Cool book title.',
             'slug'=>'title',
             'author'=>'adnan',
         ]);
        $book=Books::first();
        $response= $this->patch( $book->path() ,[
             'title'=>'new title',
             'author'=>'new author',
         ]);
         $this->assertEquals('new title', Books::first()->title);
         $this->assertEquals('new author', Books::first()->author);
         $response->assertRedirect($book->path());
   }

    /** @test */
    public function the_post_delete_test(){
        $this->withoutExceptionHandling();
         $this->post('/books',[
             'title'=>'Cool book title.',
             'slug'=>'title',
             'author'=>'adnan',
         ]);
        $book= Books::first();
         $this->assertCount(1, Books::all());
       $response= $this->delete('/books/'. $book->id);
        $this->assertCount(0, Books::all());
        $response->assertRedirect('/books');
   }
   /** @test */
   public function example_of_how_to_make_a_page(){
        $this->assertTrue(True);
    }
}
