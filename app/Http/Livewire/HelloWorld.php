<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{
    public $name='kamal';
    public $loud=false;
    public $greet= [];

    public function resetName()
     {
        $this->name= 'Pice';
    }
    public function render()
    {
        return view('livewire.hello-world',['name'=>'adnan']);
    }
}
