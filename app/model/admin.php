<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    public $table = "admin";
    public $primaryKey = "id";
    public $timestamps = false;
}
