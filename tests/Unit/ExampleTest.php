<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabaseState;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
     public function user_has_fullname_attribute()
    {
        User::create([
            'name'=>'Adnan Morshed',
            'email'=>'abc@example.com',
            'password'=>'password',
        ]);
        $user=User::first();
        $this->assertEquals('Adnan Morshed', $user->fullname);
    }
}
