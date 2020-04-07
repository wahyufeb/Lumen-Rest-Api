<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
        'title', 'author', "publisher", "year", "page"
    ];
    protected $table = "books";
}
