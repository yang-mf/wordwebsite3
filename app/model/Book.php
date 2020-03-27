<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $table = "book";
    public $primaryKey = "id";
    public $timestamps = false;

}
