<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Books extends Model
{
    protected $guarded= [];
    use HasFactory;
    public function path()
    {
        return '/books/'. $this->id;
    }
}
