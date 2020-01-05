<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = 'Tasks';
    public $primaryKey = 'id';
    public $timestamps = true;
}
