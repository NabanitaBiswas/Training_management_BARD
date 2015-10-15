<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marksheet extends Model
{
    protected $table="marksheets";
    protected $fillable=['trainee','mark'];
}
